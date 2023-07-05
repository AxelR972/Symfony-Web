<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface

{

    public function load(ObjectManager $manager)
    {
        $program = new Program();
        $program->setTitle('Walking dead');
        $program->setSynopsis('Des zombies envahissent la terre');
        $program->setCountry('USA');
        $program->setYear('2010');
        $program->setCategory($this->getReference('category_Action'));
        $this->addReference('program_Walking_dead', $program);
        $manager->persist($program);
        $manager->flush();

        $program = new Program();
        $program->setTitle('Power');
        $program->setSynopsis('Des gens vendent de la drogue');
        $program->setCountry('USA');
        $program->setYear('2014');
        $program->setCategory($this->getReference('category_Action'));
        $this->addReference('program_Power', $program);
        $manager->persist($program);
        $manager->flush();

        $program = new Program();
        $program->setTitle('Smallville');
        $program->setSynopsis('Un Héros sauve la Terre');
        $program->setCountry('London');
        $program->setYear('2001');
        $program->setCategory($this->getReference('category_Fantastique'));
        $this->addReference('program_Smallville', $program);
        $manager->persist($program);
        $manager->flush();

        $program = new Program();
        $program->setTitle('Breaking Bad');
        $program->setSynopsis('Deux hommes vendent de la meth');
        $program->setCountry('USA');
        $program->setYear('2008');
        $program->setCategory($this->getReference('category_Action'));
        $this->addReference('program_Breaking Bad', $program);
        $manager->persist($program);
        $manager->flush();

        $program = new Program();
        $program->setTitle('American Horror Story');
        $program->setSynopsis('Différentes histoires d\'horreur');
        $program->setCountry('USA');
        $program->setYear('2011');
        $program->setCategory($this->getReference('category_Horreur'));
        $this->addReference('program_American Horror Story', $program);
        $manager->persist($program);
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            CategoryFixtures::class,
        ];
    }
}
