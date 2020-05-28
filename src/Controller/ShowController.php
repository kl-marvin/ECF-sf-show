<?php

namespace App\Controller;

use App\Repository\ShowRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShowController extends AbstractController
{
    /**
     * @Route("/", name="show")
     */
    public function index(ShowRepository $showRepository)
    {
        $shows = $showRepository->findAll();
        dump($shows);

        return $this->render('show/index.html.twig', [
            'shows' => $shows
        ]);
    }
}
