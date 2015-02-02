<?php

namespace Gbs\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gbs\BlogBundle\Entity\Post;

class LoadPost implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $post = new Post();
            $post->setTitle("#{$i} post");
            $post->setBody('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus egestas dolor.');
            $manager->persist($post);
        }

        $manager->flush();
    }
}