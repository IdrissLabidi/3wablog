<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;
class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for($i=0;$i<50;$i++){
            $comment = new Comment();
            $comment->setContent($faker->sentence())
                    ->setpost($this->getReference('post'. rand(0, 9)))
                    ->setUser($this->getReference('user'. rand(0, 4)));

            $manager->persist($comment);
            
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            PostFixtures::class
        ];
    }
}
