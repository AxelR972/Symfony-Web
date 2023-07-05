<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        //src/DataFixtures/SeasonFixtures.php
        $season = new Season();
        $season->setNumber(1);
        $season->setYear(2010);
        $season->setDescription('Après avoir été blessé dans l’exercice de ses fonctions,
        le shérif Rick Grimes se réveille d’un coma de plusieurs semaines et découvre un monde post-apocalyptique où la quasi-totalité de la population américaine s’est transformée en zombies.
        Seul et déboussolé, Rick se rend à Atlanta pour rechercher sa femme Lori et son fils Carl.');
        $season->setProgram($this->getReference('program_Walking_dead'));
        $this->addReference('season1_Walking_dead', $season);
        $manager->persist($season);
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          ProgramFixtures::class,
        ];
    }
}
