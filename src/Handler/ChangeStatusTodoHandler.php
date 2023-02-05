<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Handler;

use App\Entity\Todo;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Description of ChangeStatusTodoHandler
 *
 * @author oleglaban
 */
class ChangeStatusTodoHandler extends BaseHandler implements TodoHandlerInterface
{
    
    /**
     * 
     * @param Todo $todo
     * @throws InvalidStatusTodoException
     * @return Todo
     */
    public function handle(Todo $todo): Todo
    {
        $request = $this->getRequest();
        
        $status = $request->get('status', Todo::STATUS_CRAETED);
        
        return $todo->setStatus($status);
        
    }
}
