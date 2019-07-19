<?php

namespace App\Controller;

use App\Service\Read\ReadSupervisorYaml;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class SupervisorController extends AbstractController
{
    /** @var ReadSupervisorYaml */
    private $readSupervisorYaml;

    public function __construct(ReadSupervisorYaml $readSupervisorYaml)
    {
        $this->readSupervisorYaml = $readSupervisorYaml;
    }

    public function index()
    {
        error_reporting(0);

        $consumers = $this->readSupervisorYaml->readConsumers();

        var_dump($consumers);
        die('asdasdasd');

        return new JsonResponse(array($number));
    }
}
