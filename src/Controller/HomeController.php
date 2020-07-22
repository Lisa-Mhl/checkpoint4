<?php

namespace App\Controller;

use App\Entity\Bug;
use App\Repository\ArticleRepository;
use App\Repository\BugRepository;
use App\Repository\UserRepository;
use http\Env\Response;
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
        return $this->render('home/debug.html.twig', [
            'bugs' => $bugRepository->findAll(),
        ]);
    }

    /**
     * @Route("/debug/{id}", name="debugdetails")
     */
    public function debugDetails(Bug $bug)
    {
        return $this->render('home/debugdetails.html.twig', [
            'bug' => $bug,
        ]);
    }

    /**
     * @Route("/profil/{id}", name="profile")
     */
    public function profile()
    {
        return $this->render('home/profile.html.twig');
    }

}
