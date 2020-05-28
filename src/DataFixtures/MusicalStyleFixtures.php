<?php

namespace App\DataFixtures;

use App\Entity\MusicalStyle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MusicalStyleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $style = new MusicalStyle();
        $style->setName("Electro");
        $manager->persist($style);

        $style = new MusicalStyle();
        $style->setName("Jazz");
        $manager->persist($style);

        $style = new MusicalStyle();
        $style->setName("RnB");
        $manager->persist($style);

        $style = new MusicalStyle();
        $style->setName("Rap");
        $manager->persist($style);

        $style = new MusicalStyle();
        $style->setName("New Age");
        $manager->persist($style);

        $style = new MusicalStyle();
        $style->setName("Gospel");
        $manager->persist($style);

        $style = new MusicalStyle();
        $style->setName("Classique");
        $manager->persist($style);

        $style = new MusicalStyle();
        $style->setName("Heavy Metal");
        $manager->persist($style);

        $style = new MusicalStyle();
        $style->setName("Reggae");
        $manager->persist($style);

        $style = new MusicalStyle();
        $style->setName("Country");
        $manager->persist($style);

        $style = new MusicalStyle();
        $style->setName("Rock");
        $manager->persist($style);


        $manager->flush();
    }
}

