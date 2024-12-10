<?php

namespace App\Factory;

use App\Entity\Author;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Author>
 */
final class AuthorFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return Author::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return function () {
            $faker = self::faker();
            
            // Generate a birthDate at least 20 years ago
            $birthDate = $faker->dateTimeBetween('-100 years', '-20 years');

            // Determine if the author is deceased and calculate deathDate if applicable
            $isDeceased = $faker->boolean(50);
            $deathDate = $isDeceased
                ? $faker->dateTimeBetween($birthDate->format('+20 years'), $birthDate->format('+100 years'))
                : null;

            return [
                'birthDate' => $birthDate,
                'createdAt' => \DateTimeImmutable::createFromMutable($faker->dateTime()),
                'firstname' => $faker->firstName(),
                'name' => $faker->lastName(),
                'deathDate' => $deathDate,
                'nationality' => $faker->country(),
                'updatedAt' => \DateTimeImmutable::createFromMutable($faker->dateTime()),
            ];
        };
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Author $author): void {})
        ;
    }
}
