<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArtistFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
       $artist = new Artist();
       $artist->setName("The Weeknd");
       $manager->persist($artist);

        $artist = new Artist();
        $artist->setName("Hans Zimmer");
        $manager->persist($artist);

        $artist = new Artist();
        $artist->setName("Iron Maiden");
        $manager->persist($artist);

        $artist = new Artist();
        $artist->setName("M");
        $manager->persist($artist);

        $artist = new Artist();
        $artist->setName("Texas");
        $manager->persist($artist);

        $artist = new Artist();
        $artist->setName("Hans Zimmer");
        $manager->persist($artist);

        $artist = new Artist();
        $artist->setName("The Avener");
        $manager->persist($artist);

        $artist = new Artist();
        $artist->setName("Sting");
        $manager->persist($artist);

        $artist = new Artist();
        $artist->setName("Muse");
        $manager->persist($artist);


        $manager->flush();
    }
}

