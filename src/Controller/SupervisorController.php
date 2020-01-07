<?php

namespace App\Controller;

use App\FormType\ConsumerCollectionType;
use App\Service\Read\ReadSupervisorYaml;
use App\Service\SupervisorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class SupervisorController extends AbstractController
{
    /** @var ReadSupervisorYaml */
    private $readSupervisorYaml;

    /** @var SupervisorService */
    private $supervisorService;

    public function __construct(ReadSupervisorYaml $readSupervisorYaml, SupervisorService $supervisorService)
    {
        $this->readSupervisorYaml = $readSupervisorYaml;
        $this->supervisorService = $supervisorService;
    }

    public function index(Request $request)
    {
        $consumerCollection = $this->readSupervisorYaml->readConsumers();

        $form = $this->createForm(ConsumerCollectionType::class, $consumerCollection);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $consumerCollection = $form->getData();

            $this->supervisorService->recomputeSupervisor($consumerCollection);
        }

        return $this->render('read_supervisor.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
