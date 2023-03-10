<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

namespace App\Service\Interfaces;

use Symfony\Component\Serializer\SerializerInterface;

/**
 *
 * @author oleglaban
 */
interface SerializerServiceInterface
{
    public static function getSerializer(): SerializerInterface;
}
