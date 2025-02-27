<?php

namespace App\Console\Commands;

use App\Domain\Farm\Animals\Chiken;
use App\Domain\Farm\Animals\Cow;
use App\Domain\Farm\Ranch;
use Illuminate\Console\Command;

class Farm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'farm:life';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $ranch = app(Ranch::class);

        /** Добавляем в хлев 10 коров */
        for ($i = 1; $i <= 10; $i++) {
            $ranch->addAnimal(new Cow("Cow #{$i}"));
        }

        /** Добавляем в хлев 20 куриц */
        for ($i = 1; $i <= 20; $i++) {
            $ranch->addAnimal(new Chiken("Chicken #{$i}"));
        }

        // Выводим количество животных
        echo "Количество животных:\n";
        $this->seeAnimalCount($ranch);

        // Сбор продукции за неделю
        for ($i = 1; $i <= 7; $i++) {
            $ranch->collectProduction();
        }

        // Выводим общее количество продукции
        echo "\nКоличество продуктов за неделю:\n";
        $this->seeProduction($ranch);

        // Добавляем ещё 5 кур и 1 корову
        for ($i = 21; $i <= 25; $i++) {
            $ranch->addAnimal(new Chiken("Chicken{$i}"));
        }
        $ranch->addAnimal(new Cow("Cow11"));

        // Выводим количество животных после добавления
        echo "\nЖивотных в хлеву после пополнения:\n";
        $this->seeAnimalCount($ranch);

        // Сбор продукции за ещё одну неделю
        for ($i = 1; $i <= 7; $i++) {
            $ranch->collectProduction();
        }

        // Выводим общее количество продукции
        echo "\nПроизводство за две недели:\n";
        $this->seeProduction($ranch);
    }

    private function seeProduction(Ranch $ranch)
    {
        foreach ($ranch->production as $animalName => $products) {
            echo "$animalName: ";

            foreach($products as $productName => $productCount)
                echo "$productName=$productCount ";

            echo "\n";
        }
    }

    private function seeAnimalCount(Ranch $ranch)
    {
        foreach ($ranch->getAnimalCount() as $animal => $count) {
            echo "$animal: $count\n";
        }
    }
}
