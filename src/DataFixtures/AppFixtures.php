<?php

namespace App\DataFixtures;

use App\Story\DefaultAuthorStory;
use App\Story\DefaultBookStory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        DefaultAuthorStory::load();
        DefaultBookStory::load();
    }
}
