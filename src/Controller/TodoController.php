<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controller;

use App\Entity\Todo;
use App\Handler\ChangeStatusTodoHandler;
use App\Handler\ListTodoHandlerInterface;
use App\Handler\ListTodoHandler;
use App\Handler\TodoHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of TodoController
 *
 * @author oleglaban
 */
class TodoController extends AbstractController
{
    
    /**
     * 
     * @param TodoHandlerInterface $createTodoHandler
     * @param TodoHandlerInterface $updateTodoHandler
     * @param ChangeStatusTodoHandler $changeStatusTodoHandler
     */
    public function __construct(
            private TodoHandlerInterface $createTodoHandler,
            private TodoHandlerInterface $updateTodoHandler,
            private TodoHandlerInterface $changeStatusTodoHandler
    ) {
    }
   
    /**
     * @param ListTodoHandler $todoHandler
     */
   #[Route('/todos', name: 'list_todo', methods: ['GET'])]
   public function index(ListTodoHandlerInterface $todoHandler): JsonResponse
   {
       return new JsonResponse($todoHandler->handle());
   }
    
    
   #[Route('/todo', name: 'create_todo')]
   public function craate(EntityManagerInterface $em): JsonResponse
   {
      $todo = $this->createTodoHandler->handle(new Todo());
      $em->flush();
      
      // TODO - add serializer
      return new JsonResponse([
          'id' => $todo->getId(),
          'title' => $todo->getTitle(),
          'description' => $todo->getDescription(),
          'status' => $todo->getStatus(),
      ], Response::HTTP_CREATED);
   }
   
   #[Route('/todo/{id}', name: 'update_todo', methods: ['PUT'])]
   public function update(Todo $todo, EntityManagerInterface $em): JsonResponse
   {
       $this->updateTodoHandler->handle($todo);
       $em->flush();
       
       return new JsonResponse([
           'id' => $todo->getId(),
           'title' => $todo->getTitle(),
           'description' => $todo->getDescription(),
           'status' => $todo->getStatus(),
       ]);
   }
   
   /**
    * 
    * @param Todo $todo
    * @param EntityManagerInterface $em
    * @return JsonResponse
    */
   #[Route('todo/{id}/status', name: 'change_tood_status', methods: ['PUT'])]
   public function changeStatus(
            Todo $todo,
            EntityManagerInterface $em
    ): JsonResponse
    {
        $this->changeStatusTodoHandler->handle($todo);
        $em->flush();
        
        return new JsonResponse([
             'id' => $todo->getId(),
            'title' => $todo->getTitle(),
            'description' => $todo->getDescription(),
            'status' => $todo->getStatus(),
        ]);
    }
}
