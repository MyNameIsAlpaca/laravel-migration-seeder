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
            $newTrain->time_arrive = $faker->time();
            $newTrain->time_departure = $faker->time();
            $newTrain->train_number = $faker->randomNumber(4, true);
            $newTrain->train_carriage = $faker->randomNumber(2, false);
            $newTrain->in_time = $faker->boolean();
            $newTrain->cancelled = $faker->boolean();

            $newTrain->save();
        }
    }
}
