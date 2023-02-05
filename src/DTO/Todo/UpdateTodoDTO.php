<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\DTO\Todo;

use Symfony\Component\HttpFoundation\Request;

/**
 * Description of UpdateTodoDTO
 *
 * @author oleglaban
 */
class UpdateTodoDTO implements DTOFromRequestInterface
{
    public int $id;
    
    public string $title;
   
    public string $description;
    
    /**
     * 
     * @param Request $request
     * @return self
     */
    public static function createFromRequest(Request $request): self
    {
        $dto = new self();
        $dto->id = $request->get('id');
        $dto->title = (string) $request->get('title');
        $dto->description = $request->get('description');
        
        return $dto;
    }

}
