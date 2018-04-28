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
        $user = $this->getUser();
        $nom = $user->getUsername();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'thename' => $nom,
        ]);
    }
    
    /**
     * @Route("/admin")
     */
    public function admin()
    {
        return new Response('<html><body>Admin Page!</body></html>');
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
    
    
    /**
     * La route pour se deconnecter.
     *
     * Mais celle ci ne doit jamais être executé car symfony l'interceptera avant.
     *
     *
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
          throw new \Exception('This should never be reached!');
    }
    
}
