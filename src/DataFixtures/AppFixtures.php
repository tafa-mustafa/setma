<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Conseil;
use Faker\Generator;



class AppFixtures extends Conseil
{
    public function load(ObjectManager $manager)
    {
         $conseil = new Conseil();
         $manager->persist($conseil);

        $manager->flush();
    }
}
