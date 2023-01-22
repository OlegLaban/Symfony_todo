<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controller;

use App\Handler\CreateTodoHandler;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of TodoController
 *
 * @author oleglaban
 */
class TodoController extends AbstractController
{
   #[Route('/todo', name: 'create_todo')]
   public function craate(CreateTodoHandler $createTodoHandler, EntityManagerInterface $em): JsonResponse
   {
      $todo = $createTodoHandler->handle();
      $em->flush();
      
      // TODO - add serializer
      return new JsonResponse([
          'id' => $todo->getId(),
          'title' => $todo->getTitle(),
          'description' => $todo->getDescription(),
      ]);
   }
}
