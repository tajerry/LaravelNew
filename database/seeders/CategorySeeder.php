<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('categories')->insert($this->getData());

    }
    private function getData():array
    {
        $faker = Factory::create();
        $data = [];
        for($i = 0; $i < 9; $i++){
            $data[] = [
                'title' => $faker->jobTitle(),
                'description' => $faker->text(100)
            ];

        }
        return $data;
    }
}
