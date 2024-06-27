<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\EmployeeType;
use App\Entity\Employee;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RhIndexController extends AbstractController
{
    #[Route('/rh/index', name: 'rh_index')]
    public function index(): Response
    {
        return $this->render('rh_index/index.html.twig', [
            'controller_name' => 'RhIndexController',
        ]);
    }

    #[Route('/rh/add_employes', name: 'add_employes')]
    public function add_employes(Request $request): Response
    {
        $employee = new Employee();

        $employee->setFirstName('Nadine');

        $form = $this->createFormBuilder($employee)
            ->add('firstName', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
            ->getForm();

       // $form = $this->createForm(EmployeeType::class, $employee);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            // $newEmployee = $form->getData();

            // var_dump($newEmployee);

            echo 'ça marche pas';
        }

        return $this->render('rh_index/add_employes.html.twig', [
            'form' => $form,
        ]);
    }

}
