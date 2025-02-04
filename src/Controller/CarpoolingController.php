<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CarpoolingRepository;

final class CarpoolingController extends AbstractController
{
    #[Route('/carpooling', name: 'app_carpooling')]
    public function search(): Response
    {
        return $this->render('carpooling/search.html.twig');
    }

    #[Route('/carpooling/list', name: 'app_carpooling_list')]
    public function list(Request $request, CarpoolingRepository $carpoolingRepository): Response
    {
        dd($request);
        return $this->render('carpooling/list.html.twig', [
            'carpoolings' => $carpoolingRepository->findAll(),
        ]);
    }
}
