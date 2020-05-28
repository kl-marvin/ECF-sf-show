<?php

namespace App\Controller;

use App\Entity\Show;
use App\Form\AddShowType;
use App\Repository\ShowRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowController extends AbstractController
{
    /**
     * @Route("/", name="show")
     */
    public function index(ShowRepository $showRepository)
    {
        $shows = $showRepository->findAll();
        return $this->render('show/index.html.twig', [
            'shows' => $shows
        ]);
    }

    /**
     * @param Request $req
     * @param EntityManagerInterface $em
     * @return RedirectResponse|Response
     * @Route("/nouveau", name="createShow")
     */
    public function createShow(Request $req, EntityManagerInterface $em){

        $show = new Show();
        $form = $this->createForm(AddShowType::class, $show);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($show);
            $em->flush();
            $this->addFlash('success', 'L\' évenement a bien été crée !');
            return $this->redirectToRoute("show");
        }

        return $this->render("show/createShow.html.twig", [
            'show' => $show,
            'form' => $form->createView()
        ]);
    }
}
