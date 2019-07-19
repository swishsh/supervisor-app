<?php

namespace App\Controller;

use App\Service\Read\ReadSupervisorYaml;
use Symfony\Component\HttpFoundation\JsonResponse;

class SupervisorController
{
    public function index(ReadSupervisorYaml $readSupervisorYaml)
    {
        error_reporting(0);

        $number = random_int(0, 100);

        $consumers = $readSupervisorYaml->readConsumers();

        var_dump($consumers);
        die('asdasdasd');

        return new JsonResponse(array($number));
    }
}
