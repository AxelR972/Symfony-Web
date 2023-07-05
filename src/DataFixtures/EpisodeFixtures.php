<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        //src/DataFixtures/EpisodeFixtures.php
        $episode = new Episode();
        $episode->setTitle('Passé décomposé');
        $episode->setNumber(1);
        $episode->setSynopsis('Rick, shérif de la ville, s’est fait tirer dessus au cours d’une intervention.
        Quand il se réveille à l’hôpital après un long coma, il découvre un monde dévasté et des rues remplies de cadavres.
        Ceux qui ne sont pas décédés, les morts-vivants, errent à la recherche de nouvelles victimes.
        Alors qu’il cherche à retrouver sa femme et son fils, il fait la connaissance de Morgan et Duane.
        Cloîtrés dans une maison, père et fils lui explique la situation et lui donne quelques conseils élémentaires pour survivre.
        Persuadé qu’ils sont vivants, Rick compte bien retrouver sa famille et part à leur recherche.');
        $episode->setSeason($this->getReference('season1_Walking_dead'));
        $this->addReference('program1_Walking_dead', $episode);
        $manager->persist($episode);
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          SeasonFixtures::class,
        ];
    }
}
