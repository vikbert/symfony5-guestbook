<?php

namespace App\Message;

use App\ImageOptimizer;
use Psr\Log\LoggerInterface;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use App\Notification\CommentReviewNotification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Workflow\WorkflowInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class CommentMessageHandler implements MessageHandlerInterface
{
    private $entityManager;
    private $commentRepository;
    private $bus;
    private $workflow;
    private $mailer;
    private $notifier;
    private $optimizer;
    private $adminMail;
    private $photoDir;
    private $logger;

    public function __construct(
        EntityManagerInterface $entityManager,
        CommentRepository $commentRepository,
        MessageBusInterface $bus,
        WorkflowInterface $commentStateMachine,
        MailerInterface $mailer,
        NotifierInterface $notifier,
        ImageOptimizer $optimizer,
        string $adminMail,
        string $photoDir,
        LoggerInterface $logger
    ) {
        $this->entityManager = $entityManager;
        $this->commentRepository = $commentRepository;
        $this->bus = $bus;
        $this->workflow = $commentStateMachine;
        $this->mailer = $mailer;
        $this->notifier = $notifier;
        $this->optimizer = $optimizer;
        $this->adminMail = $adminMail;
        $this->photoDir = $photoDir;
        $this->logger = $logger;
    }

    public function __invoke(CommentMessage $message): void
    {
        $comment = $this->commentRepository->find($message->getId());
        if (null === $comment) {
            return;
        }

        if ($this->workflow->can($comment, 'accept')) {
            $this->workflow->apply($comment, 'accept');
            $this->entityManager->flush();
            $this->bus->dispatch($message);

            $this->logger->debug(sprintf('Comment state: [%s]', $comment->getState()));
        } elseif ($this->workflow->can($comment, 'publish_ham')) {
            $this->notifier->send(new CommentReviewNotification($comment), ...$this->notifier->getAdminRecipients());
            $this->logger->debug(sprintf('Comment state: [%s]', $comment->getState()));
        } elseif ($this->workflow->can($comment, 'optimize')) {
            if ($comment->getPhotoFilename()) {
                $filePath = $this->photoDir . '/' . $comment->getPhotoFilename();
                $this->optimizer->resize($filePath);
            }
            $this->workflow->apply($comment, 'optimize');
            $this->entityManager->flush();
        } else {
            $this->logger->debug(sprintf('Dropping comment message: %s', $comment->getId()));
        }

        $this->entityManager->flush();
    }
}
