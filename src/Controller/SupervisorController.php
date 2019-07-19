<?php

namespace App\Controller;

use App\FormType\ConsumerCollectionType;
use App\Service\Read\ReadSupervisorYaml;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

        $consumerCollection = $this->readSupervisorYaml->readConsumers();

        $form = $this->createForm(ConsumerCollectionType::class, $consumerCollection);

        return $this->render('read_supervisor.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
