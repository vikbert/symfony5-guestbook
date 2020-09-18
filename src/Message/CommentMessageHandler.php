<?php

namespace App\Message;

use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class CommentMessageHandler implements MessageHandlerInterface
{
    private $entityManager;
    private $commentRepository;
    public function __construct(EntityManagerInterface $entityManager, CommentRepository $commentRepository)
    {
        $this->entityManager = $entityManager;
        $this->commentRepository = $commentRepository;
    }

    public function __invoke (CommentMessage $message): void
    {
        $comment = $this->commentRepository->find($message->getId());
        if (null === $comment) {
            return;
        }

        $comment->setState('published');

        $this->entityManager->flush();
    }
}