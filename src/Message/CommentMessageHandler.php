<?php

namespace App\Message;

use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Twig\Mime\NotificationEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Workflow\WorkflowInterface;

final class CommentMessageHandler implements MessageHandlerInterface
{
    private $entityManager;
    private $commentRepository;
    private $bus;
    private $workflow;
    private $mailer;
    private $adminMail;
    private $logger;

    public function __construct(
        EntityManagerInterface $entityManager,
        CommentRepository $commentRepository,
        MessageBusInterface $bus,
        WorkflowInterface $commentStateMachine,
        MailerInterface $mailer,
        string $adminMail,
        LoggerInterface $logger
    ) {
        $this->entityManager = $entityManager;
        $this->commentRepository = $commentRepository;
        $this->bus = $bus;
        $this->workflow = $commentStateMachine;
        $this->mailer = $mailer;
        $this->adminMail = $adminMail;
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
            $notificationEmail = new NotificationEmail();
            $this->mailer->send(
                $notificationEmail
                ->subject('new comment posted')
                ->htmlTemplate('emails/comment_notification.html.twig')
                ->from('admin@example.com')
                ->to('admin@exmaple.com')
                ->context(['comment' => $comment])
            );

            $this->logger->debug(sprintf('Comment state: [%s]', $comment->getState()));
        } else {
            $this->logger->debug(sprintf('Dropping comment message: %s', $comment->getId()));
        }

        $this->entityManager->flush();
    }
}
