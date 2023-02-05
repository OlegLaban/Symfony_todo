<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

namespace App\DTO\Todo;

use Symfony\Component\HttpFoundation\Request;

/**
 *
 * @author oleglaban
 */
interface DTOFromRequestInterface
{
    public static function createFromRequest(Request $request): self;
}
