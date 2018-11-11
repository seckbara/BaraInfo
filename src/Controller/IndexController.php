<?php
/**
 * Created by PhpStorm.
 * User: seck
 * Date: 10/11/2018
 * Time: 20:47
 */

namespace App\Controller;


use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends Controller
{
    /**
     * @Route("/", name="index_accueil")
     */
    public function accueil()
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render("index/index.html.twig", [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/{categorie<\w+>}/{slug}_{id<\d+>}.html", name="index_article")
     */
    public function articles(Article $article)
    {
        return $this->render("index/artcile.html.twig", [
            'article' => $article
        ]);
    }
}