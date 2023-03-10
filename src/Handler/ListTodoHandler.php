<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Handler;

use App\Entity\Todo;
use App\Repository\TodoRepository;
use App\Service\SerializerService;

/**
 * Description of ListTodoHandler
 *
 * @author oleglaban
 */
class ListTodoHandler implements ListTodoHandlerInterface
{
    /**
     * 
     * @param TodoRepository $repository
     */
    public function __construct(private TodoRepository $repository)
    {
    }
    
    /**
     * 
     * @return Todo[]
     */
    public function handle(): array
    {
        $todos = $this->repository->findAll();
        $serializer = SerializerService::getSerializer();
        
        return array_map(function (Todo $todo) use ($serializer) {
            return array_merge($serializer->normalize($todo), [
                'createdAt' => $todo->getCreatedAt()->format("Y-m-d H:m:s"),
                'updatedAt' => $todo->getUpdatedAt()?->format("Y-m-d H:m:s"),
            ]);
        }, $todos);
        
    }
   
}
