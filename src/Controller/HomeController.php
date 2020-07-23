<?php

namespace App\Controller;

use App\Entity\Bug;
use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\ArticleRepository;
use App\Repository\BugRepository;
use App\Repository\CommentRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


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
    public function debugDetails(Bug $bug, Request $request, CommentRepository $commentRepository): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $comment->setBug($bug);
            $user = $this->getUser();
            $comment->setAuthor($user);
            $entityManager->persist($bug);
            $entityManager->flush();
            return $this->redirectToRoute('debug');
        }
        return $this->render('home/debugdetails.html.twig', [
            'bug' => $bug,
            'form' => $form->createView(),
            'comments' => $commentRepository->findAll(),
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
