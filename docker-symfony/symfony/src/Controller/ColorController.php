<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ColorController extends AbstractController
{
    public function index(string $color ): Response
    {
        return $this->render('color/index.html.twig', [
            'controller_name' => 'ColorController',
            'color' => $color,
        ]);
    }
}
