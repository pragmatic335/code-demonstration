<?php

namespace App\Domain\Farm;

use App\Domain\Farm\Animals\Animal;

class Ranch
{
    public private(set) array $animals = [];
    public private(set) array $production = [];

    public function addAnimal(Animal $animal): void
    {
        $this->animals[] = $animal;
    }

    public function collectProduction(): void
    {
        foreach ($this->animals as $animal)
        {
            $products = $animal->produce(...$animal::PRODUCTS);
            $animalName = basename(str_replace('\\', '/', $animal::class));

            foreach($products as $productName => $productCount) {
                if (!isset($this->production[$animalName][$productName])) {
                    $this->production[$animalName][$productName] = 0;
                }
                $this->production[$animalName][$productName] += $productCount;
            }

        }
    }

    public function getAnimalCount(): array
    {
        $count = [];
        foreach ($this->animals as $animal) {
            $type = basename(str_replace('\\', '/', $animal::class));
            if (!isset($count[$type])) {
                $count[$type] = 0;
            }
            $count[$type]++;
        }
        return $count;
    }
}
