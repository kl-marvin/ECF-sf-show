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
        $artist = new Artist();
        $artist->setName("Lady Gaga");
        $manager->persist($artist);

        $style = new MusicalStyle();
        $style->setName("Pop");
        $manager->persist($style);

        $city = new City();
        $city->setName("Paris - Saint-Denis")
            ->setCountry("France")
            ->setZip("93210");
        $manager->persist($city);

        $venu = new Venu();
        $venu->setName("Stade de France")
            ->setAddress("ZAC Cornillon 93210 Saint Denis");
        $manager->persist($venu);


        $show = new Show();
        $show->setName("Chromatica Ball")
            ->setDate(new \DateTime("2020-07-27"))
            ->setComment("Lady Gaga sera sur la route, cet été, pour une série de dates exceptionnelles et 
            de performances exclusives, limitée à 6 villes à travers le monde.")
            ->setRate(4)
            ->setArtist($artist)
            ->setVenu($venu)
            ->setStyle($style)
            ->setCity($city);

        $manager->persist($show);
        $manager->flush();
    }
}
