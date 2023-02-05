<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Handler;

use App\Entity\Todo;
use App\Repository\TodoRepository;

/**
 * Description of ListTodoHandler
 *
 * @author oleglaban
 */
class ListTodoHandler
{
    public function __construct(private TodoRepository $repository)
    {
    }
    
    /**
     * 
     * @return array
     */
    public function handle(): array
    {
        $todos = $this->repository->findAll();
        
        return array_map(function (Todo $todo) {
            return [
                'id' => $todo->getId(),
                'title' => $todo->getTitle(),
                'description' => $todo->getDescription(),
                'status' => $todo->getStatus(),
            ];
        }, $todos);
        
    }
}
