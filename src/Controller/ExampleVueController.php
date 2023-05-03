<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExampleVueController extends AbstractController
{
    #[Route('/example/vue', name: 'app_example_vue')]
    public function index(): Response
    {
        return $this->render('example_vue/index.html.twig', [
            'controller_name' => 'ExampleVueController',
            'name' => 'SymfonyBoilerplate'
        ]);
    }
}
