<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OuvriersController extends AbstractController
{
    /**
     * @Route("/ouvriers", name="ouvriers")
     */
    public function index()
    {
        return $this->render('ouvriers/index.html.twig', [
            'controller_name' => 'OuvriersController',
        ]);
    }
}
