<?php

namespace App\DataFixtures;

use App\Entity\Conseil;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Medecin;
use App\Entity\Patient;
use App\Entity\Proche;
use App\Entity\Consultation;
use Faker;



class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');


        $medecin = array();
        for ($i = 0; $i < 1111; $i++) {
            $medecin[$i] = new Medecin();

            $medecin[$i]->setNom($faker->lastName)
                ->setPrenom($faker->firstName)
                // ->setDateNaissance(date())
                ->setEmail($faker->email)
                ->setTelephone($faker->numberBetween(700000, 999999))
                ->setSpecialite($faker->word)
                ->setPasword($faker->word);
            $manager->persist($medecin[$i]);
        }



        $proche = array();

        for ($j = 0; $j < 1111; $j++) {
            $proche[$j] = new Proche();
            $proche[$j]->setNom($faker->lastName)
                ->setPrenom($faker->firstName)
                ->setTelephone($faker->numberBetween(700000, 999999))
                ->setEmail($faker->email)
                ->setAdresse($faker->address);
            $manager->persist($proche[$j]);
        }



        $patient = array();

        for ($k = 0; $k < 1111; $k++) {
            $patient[$k] = new Patient();

            $patient[$k]->setNom($faker->lastName)
                ->setPrenom($faker->firstName)
                ->setTelephone($faker->numberBetween(700000, 999999))
                ->setAges($faker->numberBetween(7, 100))
                ->setAdresse($faker->address)
                ->setMedecin($medecin[$k])
                ->setQrCode($faker->isbn10)
                ->addProche($proche[$k]);
            $manager->persist($patient[$k]);
        }


        $consultaion = array();

        for ($k = 0; $k < 1111; $k++) {
            $consultation[$k] = new Consultation();
            $consultation[$k]->setTemperature($faker->numberBetween(7, 37))
                ->setPressionArterielle($faker->numberBetween(7, 100))
                ->setFrequenceCardiaque($faker->numberBetween(7, 100))
                ->setTauxOxygene($faker->numberBetween(7, 100))
                ->setPatient($patient[$k]);
            $manager->persist($consultation[$k]);
        }
        $conseil = array();

        for ($k = 0; $k < 1111; $k++) {
            $conseil[$k] = new Conseil();
            $conseil[$k]->setContenu($faker->word)
                ->setConsultation($consultation[$k]);
            $manager->persist($conseil[$k]);
        }


        $manager->flush();
    }
}
