<?php

namespace App\Controller;

use App\Dto\Consumer;
use App\FormType\ConsumerCollectionType;
use App\Service\Read\ReadSupervisorYaml;
use function Sodium\add;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Tests\Extension\DependencyInjection\TestTypeExtension;
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

        $consumerCollection = $this->readSupervisorYaml->readConsumers();
//        $forms = [];
//
//        foreach ($consumerCollection->getConsumers() as $consumer) {
//            $form = $this->createFormBuilder($consumer)
//                ->add('name', TextType::class)
//                ->add('template', TextType::class)
//                ->add('command', TextType::class)
//                ->add('platform', TextType::class)
//                ->add('numprocs', TextType::class)
//                ->add('autostart', TextType::class)
//                ->add('startsecs', TextType::class)
//                ->add('ignore', TextType::class)
//                ->add('stopwaitsecs', TextType::class)
//                ->add('save', SubmitType::class, ['label' => 'Save supervisor config'])
//                ->getForm()->createView();
//
//            $forms[] = $form;
//        }

        $form = $this->createForm(ConsumerCollectionType::class, $consumerCollection);

        return $this->render('read_supervisor.html.twig', [
            'form' => $form->createView()
        ]);




        var_dump($consumers);
        die('asdasdasd');

        return new JsonResponse(array($number));
    }
}
