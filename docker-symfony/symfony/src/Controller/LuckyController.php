<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// ...

class LuckyController extends AbstractController
{
    public function number(int $id): Response
    {
        $number = random_int(0, $id);

        return $this-> render('lucky/number.html.twig', [
            'number' => $number
        ]);
    }

    public function randNumber(): Response
    {
        $number = random_int(0, 100);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }
}