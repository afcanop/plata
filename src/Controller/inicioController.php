<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class inicioController extends AbstractController
{
    /**
     * @Route("/inicio", name="inicio")
     */
    public function inicio(Request $request)
    {
        echo("asd");
        return $this->render('Inicio/admin.html.twig');
    }
}
