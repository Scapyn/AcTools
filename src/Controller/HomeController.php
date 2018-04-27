<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    
    /**
     * @Route("/news/{news}", name="news_show")
     */
    public function show($news)
    {
        /*return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
        */
        
        $AllComments = [
            'Hello1',
            'Bye1',
            'bibiphoque'
        ];
        
        // dump($news, $this);
        
        return $this->render('home/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $news)),
            'comments' => $AllComments,
        ]);
        
        /*return new Response(sprintf(
            'Les dernieres news : %s',
            $news
        ));
        */
    }
}
