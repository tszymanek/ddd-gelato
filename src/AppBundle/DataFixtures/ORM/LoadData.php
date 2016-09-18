<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gelato\Sale\Domain\Model\Freezer\FreezerType;

class LoadData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $showcase = new FreezerType('showcase');
        $freezingCabinet = new FreezerType('freezing cabinet');

        $manager->persist($showcase);
        $manager->persist($freezingCabinet);
        $manager->flush();
    }
}