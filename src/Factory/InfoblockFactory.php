<?php

namespace Letsrock\Factory;
use Letsrock\CreatableModel\CreatableModel;
use Letsrock\Factory\ModelFactoryInterface;
use Faker\Factory as FakerFactory;

abstract class InfoblockFactory implements ModelFactoryInterface
{
    public $faker;

    public function __construct()
    {
        $this->faker = FakerFactory::create();
    }

    public function make(int $quantity): bool
    {
        return false;
    }

    public function makeByModel(CreatableModel $model, int $quantity): bool
    {
        if (!$quantity) return false;

        $counter = 0;
        while ($counter < $quantity) {
            $data = $this->definition();

            $model->createByFactory($data);
            $counter++;
        }

        return true;
    }

    /** Gets data by $this->faker */
    abstract function definition(): array;
}