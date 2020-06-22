<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NosactivitesController extends AbstractController
{
    /**
     * @Route("/nosactivites", name="nosactivites")
     */
    public function index()
    {
        return $this->render('nosactivites/index.html.twig', [
            'controller_name' => 'NosactivitesController',
        ]);
    }
}
