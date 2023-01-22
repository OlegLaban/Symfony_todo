<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Handler;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Description of BaseHandler
 *
 * @author oleglaban
 */
abstract class BaseHandler
{
    public function __construct(protected RequestStack $requestStack)
    {
    }
    
    /**
     * @throws InvalidArgumentException if request is not found.
     * 
     * @return Request
     */
    protected function getRequest(): Request 
    {
        $request = $this->requestStack->getCurrentRequest();
        
        if ($request instanceof Request) {
            return $request;
        }
        
        throw new InvalidArgumentException('Request not found');
    }
}
