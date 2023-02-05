<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

namespace App\Handler;

use App\Entity\Todo;

/**
 *
 * @author oleglaban
 */
interface TodoHandlerInterface
{
    public function handle(Todo $todo);
}
