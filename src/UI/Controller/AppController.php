<?php

namespace Whipo\Shop\UI\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AppController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('home.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    #[Route('/admin', name: 'admin')]
    public function admin(): Response
    {
        return $this->render('home.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }
    #[Route('/css/s', name: 'css')]
    public function css(): Response
    {
        return $this->render('home.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }
}
