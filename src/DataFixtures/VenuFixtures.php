<?php

namespace App\DataFixtures;


use App\Entity\Venu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VenuFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $venu = new Venu();
        $venu->setName("Accord Hotel Arena")
            ->setAddress(" 8 Boulevard de Bercy, 75012 Paris");
        $manager->persist($venu);

        $venu = new Venu();
        $venu->setName("Zénith")
            ->setAddress("48 rue Saint Just, 13004 Marseille");
        $manager->persist($venu);

        $venu = new Venu();
        $venu->setName("Madison Square Garden")
            ->setAddress("4 Pennsylvania Plaza, NYC");
        $manager->persist($venu);

        $manager->flush();
    }
}
