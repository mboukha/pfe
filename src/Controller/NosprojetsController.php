<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NosprojetsController extends AbstractController
{
    /**
     * @Route("/nosprojets", name="nosprojets")
     */
    public function index()
    {
        return $this->render('nosprojets/index.html.twig', [
            'controller_name' => 'NosprojetsController',
        ]);
    }
}
