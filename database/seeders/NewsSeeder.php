<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('news')->insert($this->getData());
    }
    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        for($i = 0; $i < 9; $i++){
            $data[] = [
                'category_id' => 0,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(200, 170),
                'status' => 'ACTIVE',
                'description' => $faker->text(100)
            ];

        }
        return $data;
    }
}
