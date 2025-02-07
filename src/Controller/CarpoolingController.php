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

#[Route('/contact', name:'contatc')]
public function contact(): Response
{
    return $this->render('contact/contact.html.twig');
}


    #[Route('/carpooling/list', name: 'app_carpooling_list')]
    public function list(Request $request, CarpoolingRepository $carpoolingRepository): Response
    {
        $depart = $request->request->get('depart');
        $arrivee = $request->request->get('arrivee');
        $date = $request->request->get('date');
        $passagers = $request->request->get('passagers');

        $carpoolings = $carpoolingRepository->findByFilters($depart,$arrivee,$date,$passagers);

        return $this->redirectToRoute('app_carpooling_list', [
            'carpoolings' => $carpoolings,
        ]);
    }
}
