<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    
    /**
     * @Route("/news/{news}")
     */
    public function show($news)
    {
        /*return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
        */
        return new Response(sprintf(
            'Les dernieres news : %s',
            $news
        ));
    }
}
