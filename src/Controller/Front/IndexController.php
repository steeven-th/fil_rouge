<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController {
    /**
     * @Route("/", name="index")
     */
    public function index(): Response {
        return $this->render('front/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
