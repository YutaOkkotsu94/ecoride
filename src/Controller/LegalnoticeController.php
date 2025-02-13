<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LegalnoticeController extends AbstractController
{
    #[Route('/legalnotice', name: 'app_legalnotice')]
    public function index(): Response
    {
        return $this->render('legalnotice/index.html.twig', [
            'controller_name' => 'LegalnoticeController',
        ]);
    }
}
