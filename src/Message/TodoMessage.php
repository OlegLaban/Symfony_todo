<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Message;

/**
 * Description of TodoMessage
 *
 * @author oleglaban
 */
class TodoMessage
{
    public function __construct(
            private int $id,
            private array $context = [],
    ) {
        
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getContext(): array
    {
        return $this->context;
    }

}
