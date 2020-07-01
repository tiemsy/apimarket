<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;


class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {


        $faker = Factory::create('fr_FR');

        for($i = 0; $i <= 10; $i++) {
            $product = new Product();

            $product->setName($faker->words(3, true))
                ->setDescription($faker->words(3, true))
                ->setColor($faker->colorName)
                ->setWeight($faker->numberBetween(20, 350))
                ->setPriceHt($faker->numberBetween(10, 2000))
                ->setPriceTtc($faker->numberBetween(15, 2500))
                ->setStock($faker->boolean)
            ;

            $manager->persist($product);
        }

        $manager->flush();
    }
}
