<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Handler;

use App\Entity\Todo;
use App\Exception\Todo\InvalidStatusTodoException;
use App\Message\TodoMessage;
use App\MessageHandler\TodoMessageHandler;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Description of ChangeStatusTodoHandler
 *
 * @author oleglaban
 */
class ChangeStatusTodoHandler extends BaseHandler implements TodoHandlerInterface
{
    
    public function __construct(RequestStack $requestStack, private MessageBusInterface $messageBus)
    {
        parent::__construct($requestStack);
    }
    
    /**
     * 
     * @param Todo $todo
     * @throws InvalidStatusTodoException
     * @return Todo
     */
    public function handle(Todo $todo): Todo
    {
        $this->messageBus->dispatch(new TodoMessage($todo->getId(), [
                    TodoMessageHandler::STATUS_SUCCESS => Todo::STATUS_IN_PROGRESS,
                    TodoMessageHandler::STATUS_ERROR => Todo::STATUS_CRAETED,
        ]));

        return $todo;
    }

}
