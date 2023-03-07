<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\MessageHandler;

use App\Entity\Todo;
use App\Message\TodoMessage;
use App\Repository\TodoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * Description of TodoMessageHandler
 *
 * @author oleglaban
 */
#[AsMessageHandler]
class TodoMessageHandler
{
    public const STATUS_SUCCESS = 'statusSuccess';
    
    public const STATUS_ERROR = 'statusError';

    public function __construct(
            private EntityManagerInterface $entityManager,
            private TodoRepository $todoRepository,
    )
    {
        
    }

    public function __invoke(TodoMessage $message)
    {
        /**@var Todo $todo */
        $todo = $this->todoRepository->find($message->getId());
        
        if (!$todo) {
            return;
        }
        
        $rand = rand(0, 1);
        file_put_contents('/var/www/test.log', $rand);
        sleep(10);
        if ($rand !== 0) {
            $todo->setStatus($message->getContext()[self::STATUS_SUCCESS]);
        } else {
            $todo->setStatus($message->getContext()[self::STATUS_ERROR]);
        }
        
        $this->entityManager->flush();
    }

}
