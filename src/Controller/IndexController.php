<?php
/**
 * Created by PhpStorm.
 * User: seck
 * Date: 10/11/2018
 * Time: 20:47
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends Controller
{
    /**
     * @Route("/", name="index_accueil")
     */
    public function accueil()
    {
        return $this->render("index/index.html.twig");
    }
}