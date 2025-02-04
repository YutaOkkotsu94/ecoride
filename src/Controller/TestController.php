<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TestController extends AbstractController
{
    #[Route('/test/{max}', name: 'app_test')]
    public function index(int $max): Response
    {
        $number = random_int(0, $max);
        return $this->render('test/index.html.twig', [
            'controller_name' => $number,
            'username' => "test",
        ]);
    }
}
