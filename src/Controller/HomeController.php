<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/debug", name="debug")
     */
    public function debug()
    {
        return $this->render('home/debug.html.twig');
    }

    /**
     * @Route("/profil", name="profile")
     */
    public function profile()
    {
        return $this->render('home/profile.html.twig');
    }

}
