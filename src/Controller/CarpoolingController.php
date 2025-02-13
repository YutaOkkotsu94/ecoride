<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CarpoolingRepository;

final class CarpoolingController extends AbstractController
{


    #[Route('/carpooling', name: 'app_carpooling')]
    public function search(Request $request, CarpoolingRepository $carpoolingRepository, SessionInterface $session): Response
    {
        $depart = $request->request->get('depart');
        $arrivee = $request->request->get('arrivee');
        $date = $request->request->get('date');
        $passagers = $request->request->get('passagers');

        if ($depart !== null || $arrivee !==null || $date !== null || $passagers !==null) {   
            $carpoolings = $carpoolingRepository->findByFilters($depart,$arrivee,$date,$passagers);
        
            $session->set('carpoolings', $carpoolings);

            return $this->redirectToRoute('app_carpooling_list', ['carpoolings' => $carpoolings]);
            
        }
       

        

        return $this->render('carpooling/search.html.twig');
    }


    #[Route('/carpooling/list', name: 'app_carpooling_list')]
    public function list(SessionInterface $session): Response
    {
        $carpoolings = $session->get('carpoolings', []);
        return $this->render('carpooling/list.html.twig', [
            'carpoolings' => $carpoolings,
        ]);
    }
}
