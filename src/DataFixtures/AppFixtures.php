<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\Entity\City;
use App\Entity\MusicalStyle;
use App\Entity\Show;
use App\Entity\Venu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $gaga= new Artist();
        $gaga->setName("Lady Gaga");
        $manager->persist($gaga);

        $dj = new Artist();
        $dj->setName("Durand Jones & The Indications");
        $manager->persist($dj);

        $posty = new Artist();
        $posty->setName("Post Malone");
        $manager->persist($posty);

        $style = new MusicalStyle();
        $style->setName("Pop");
        $manager->persist($style);

        $Paris = new City();
        $Paris->setName("Paris - Saint-Denis")
            ->setCountry("France")
            ->setZip("93210");
        $manager->persist($Paris);

        $Ventura = new City();
        $Ventura->setName("Ventura")
            ->setCountry("USA")
            ->setZip("10290");
        $manager->persist($Ventura);

        $Reno = new City();
        $Reno->setName("Reno")
            ->setCountry("USA")
            ->setZip("03010");
        $manager->persist($Reno);

        $sdf = new Venu();
        $sdf->setName("Stade de France")
            ->setAddress("ZAC Cornillon 93210 Saint Denis");
        $manager->persist($sdf);

        $cargo = new Venu();
        $cargo->setName("Cargo - Withney Peak Hotel")
            ->setAddress("255 NorthVirginian, Reno, NC, USA");
        $manager->persist($cargo);

        $magestic = new Venu();
        $magestic->setName("Majestic Ventura Theatre")
            ->setAddress("26 South Chesnut Street, Ventura, CA,  USA");
        $manager->persist($magestic);


        $show = new Show();
        $show->setName("Chromatica Ball")
            ->setDate(new \DateTime("2020-07-27"))
            ->setComment("Lady Gaga sera sur la route, cet été, pour une série de dates exceptionnelles et 
            de performances exclusives, limitée à 6 villes à travers le monde.")
            ->setRate(4)
            ->setArtist($gaga)
            ->setVenu($sdf)
            ->setStyle($style)
            ->setCity($Paris);

        $manager->persist($show);


        $show2 = new Show();
        $show2->setName("Durand with Daisy Tour")
            ->setDate(new \DateTime("2022-09-01"))
            ->setComment("Phénomène Soul né dans le Bayou, Durand Jones a fait ses débuts à l’église, après avoir été forcé par sa grand-mère à chanter dans une chorale de sa petite ville en Louisiane,
            car elle pensait qu’il chantait beaucoup trop à la maison. ")
            ->setRate(4)
            ->setArtist($dj)
            ->setVenu($cargo)
            ->setStyle($style)
            ->setCity($Reno);

        $manager->persist($show2);


        $show3 = new Show();
        $show3->setName("Beer Pong and Bentley Tour")
            ->setDate(new \DateTime("2020-09-01"))
            ->setComment("Post Malone revient avec son nouvel album")
            ->setRate(5)
            ->setArtist($posty)
            ->setVenu($magestic)
            ->setStyle($style)
            ->setCity($Ventura);

        $manager->persist($show3);
        $manager->flush();


    }
}
