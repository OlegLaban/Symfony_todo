<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Handler;

use App\Entity\Todo;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Description of CreateTodoHandler
 *
 * @author oleglaban
 */
class CreateTodoHandler extends BaseHandler implements HandlerInterface
{
    public function __construct(RequestStack $requestStack, private EntityManagerInterface $entityManager)
    {
        parent::__construct($requestStack);
    }
    
    /**
     * 
     * @return Todo
     */
    public function handle(): Todo
    {
        $request = $this->getRequest();
        
        $todo = new Todo();
        
        $todo->setStatus(Todo::STATUS_CRAETED);
        $todo->setTitle($request->get('title', ''));
        $todo->setDescription($request->get('description', null));
        $this->entityManager->persist($todo);
        return $todo;
    }
}
