<?php

namespace App\Controller;

use App\Entity\Show;
use App\Form\AddShowType;
use App\Repository\ArtistRepository;
use App\Repository\CityRepository;
use App\Repository\MusicalStyleRepository;
use App\Repository\ShowRepository;
use App\Repository\VenuRepository;
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
     * @param ShowRepository $showRepository
     * @param MusicalStyleRepository $musicalStyleRepository
     * @param CityRepository $cityRepository
     * @param ArtistRepository $artistRepository
     * @return Response
     */
    public function index(ShowRepository $showRepository,
                          MusicalStyleRepository $musicalStyleRepository,
                          CityRepository $cityRepository,
                          ArtistRepository $artistRepository)
    {
        $shows = $showRepository->findAll();
        $styles = $musicalStyleRepository->findAll();
        $cities = $cityRepository->findAll();
        $artists = $artistRepository->findAll();

        return $this->render('show/index.html.twig', [
            'shows' => $shows,
            'styles' => $styles,
            'cities' => $cities,
            'artists' => $artists
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

    /**
     * @Route("/edit/{id}", name="editShow")
     * @param EntityManagerInterface $em
     * @param Request $req
     * @param Show $show
     * @return Response
     */
    public function editShow(EntityManagerInterface $em, Request $req, Show $show){

        $form = $this->createForm(AddShowType::class, $show);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid()){
            $em->flush();
            return $this->redirectToRoute("show");
        }

        return $this->render('show/editShow.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/genre/{id}", name="byStyle")
     * @param $id
     * @param ShowRepository $showRepository
     * @return Response
     */
    public function byStyle($id, ShowRepository $showRepository){
        $shows = $showRepository->getShowsByStyle($id);

        return $this->render('show/byStyle.html.twig', [
            'showsbyStyle' => $shows

        ]);
    }

    /**
     * @param $id
     * @param ShowRepository $showRepository
     * @return Response
     * @Route("/ville/{id}", name="byCity")
     */
    public function byCity($id, ShowRepository $showRepository){
        $shows = $showRepository->getShowsByCity($id);

        return $this->render('show/byCity.html.twig', [
            'showsbyCity' => $shows
        ]);
    }

    /**
     * @param $id
     * @param ShowRepository $showRepository
     * @return Response
     * @Route("/artiste/{id}", name="byArtist")
     */
    public function byArtist($id, ShowRepository $showRepository){
        $shows = $showRepository->getShowsByArtist($id);

        $totalRate = $showRepository->getArtistTotalRate($id);

        //var_dump($totalRate);

        return $this->render('show/byArtist.html.twig', [
            'showsbyArtist' => $shows,
            'totalRate' => $totalRate
        ]);
    }

    /**
     * @Route("/salles", name="venues")
     * @param VenuRepository $venuRepository
     * @return Response
     */
    public function venus(VenuRepository $venuRepository){

        $venues = $venuRepository->findAll();

        return $this->render('show/venues.html.twig', [
            'venues' => $venues
        ]);
    }

}
