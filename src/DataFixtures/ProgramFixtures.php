<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture
{
    const PROGRAMS = [
        'category_Aventure' => 'Bennalve 2',
        'category_Animation' => 'Tintin et les 7',
        'category_Fantastique' => 'Gogo dans la vago 2',
        'category_Horreur' => 'Bouh 2'
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAMS as $key => $program) {
            $programItem = new Program();
            $programItem->setTitle($program);
            $programItem->setSynopsis('A toi de voir');
            $programItem->setCategory($this->getReference($key));
            $manager->persist($programItem);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            CategoryFixtures::class,
        ];
    }
}
