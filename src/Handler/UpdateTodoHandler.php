<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Handler;

use App\DTO\Todo\UpdateTodoDTO;
use App\Entity\Todo;
use App\Repository\TodoRepository;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Description of UpdateTodoHandler
 *
 * @author oleglaban
 */
class UpdateTodoHandler extends BaseHandler
{
    public function __construct(protected RequestStack $requestStack, private TodoRepository $repository)
    {
        parent::__construct($this->requestStack);
    }
    
    public function handle(): Todo
    {
        $request = $this->getRequest();
        $updateTodoDTO = UpdateTodoDTO::createFromRequest($request);
        
        return $this->repository->updateTodo($updateTodoDTO);
    }
}
