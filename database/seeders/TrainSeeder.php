<?php

namespace Database\Seeders;

use App\Models\train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {

            $newTrain = new train();

            $newTrain->company = $faker->words(2, true);
            $newTrain->start_station = $faker->city();
            $newTrain->destination_station = $faker->city();
            $newTrain->date_arrive = $faker->dateTimeInInterval('-1 week', '+3 days')->format('Y-m-d H:i:s');
            $arriveDate = \Carbon\Carbon::parse($newTrain->date_arrive);
            $newTrain->date_departure = $arriveDate->copy()->subHours($faker->numberBetween(1, 8))->format('Y-m-d H:i:s');
            $newTrain->train_number = $faker->randomNumber(4, true);
            $newTrain->train_carriage = $faker->randomNumber(2, false);
            $newTrain->in_time = $faker->boolean();
            $newTrain->cancelled = $faker->boolean();

            $newTrain->save();
        }

        $trainTable = fopen(__DIR__ . '/../trains.csv', 'r');

        $trainFile = fgetcsv($trainTable);

        $trainFile = fgetcsv($trainTable);

        while ($trainFile != false) {

            $newTrain = new train();

            $newTrain->company = $trainFile[0];
            $newTrain->start_station = $trainFile[1];
            $newTrain->destination_station = $trainFile[2];
            $newTrain->date_arrive = $trainFile[4];
            $newTrain->date_departure = $trainFile[3];
            $newTrain->train_number = $trainFile[5];
            $newTrain->train_carriage = $trainFile[6];
            $newTrain->in_time = $trainFile[7];
            $newTrain->cancelled = $trainFile[8];

            $newTrain->save();

            $trainFile = fgetcsv($trainTable);
        };
    }
}
