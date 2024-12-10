<?php

namespace App\Story;

use App\Entity\Author;
use App\Factory\AuthorFactory;
use Zenstruck\Foundry\Story;

final class DefaultAuthorStory extends Story
{
    public function build(): void
    {
        // TODO build your story here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#stories)
        AuthorFactory::createMany(150);
    }
}
