<?php

namespace App\DataFixtures;


use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $city = new City();
        $city->setName("Marseille")
            ->setZip("1300")
            ->setCountry('France');
        $manager->persist($city);

        $city = new City();
        $city->setName("New York")
            ->setZip("1001")
            ->setCountry('USA');
        $manager->persist($city);

        $manager->flush();
    }
}