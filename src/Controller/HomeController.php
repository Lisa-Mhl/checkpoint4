<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\BugRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param ArticleRepository $articleRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ArticleRepository $articleRepository)
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'articles' => $articleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/debug", name="debug")
     */
    public function debug(BugRepository $bugRepository)
    {
        return $this->render('home/debug.html.twig',[
            'bugs' => $bugRepository->findAll(),
        ]);
    }

    /**
     * @Route("/profil", name="profile")
     */
    public function profile()
    {
        return $this->render('home/profile.html.twig');
    }

}
