<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Category;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $limit = 15;
        for ($i = 0; $i < $limit; $i++) {
            $data[] = [
                'name' => 'Trà ' . $faker->word,
                'price' => $faker->numberBetween(10000, 40000),
                'brief' => $faker->text(300),
                'description' => $faker->text($maxNbChars = 2000),
                'category_id' => 2,
                'quantity' => $faker->numberBetween(50, 150),
            ];
        }
        for ($i = 0; $i < $limit; $i++) {
            $data[] = [
                'name' => 'Cà Phê ' . $faker->word,
                'price' => $faker->numberBetween(10000, 4000),
                'brief' => $faker->text(300),
                'description' => $faker->text($maxNbChars = 2000),
                'category_id' => 1,
                'quantity' => $faker->numberBetween(50, 150),
            ];
        }
        for ($i = 0; $i < $limit; $i++) {
            $data[] = [
                'name' => 'Sinh tố ' . $faker->word,
                'price' => $faker->numberBetween(10000, 4000),
                'brief' => $faker->text(300),
                'description' => $faker->text($maxNbChars = 2000),
                'category_id' => 3,
                'quantity' => $faker->numberBetween(50, 150),
            ];
        }
        for ($i = 0; $i < $limit; $i++) {
            $data[] = [
                'name' => 'Soda - Mijito ' . $faker->word,
                'price' => $faker->numberBetween(10000, 4000),
                'brief' => $faker->text(300),
                'description' => $faker->text($maxNbChars = 2000),
                'category_id' => 4,
                'quantity' => $faker->numberBetween(50, 150),
            ];
        }
        for ($i = 0; $i < $limit; $i++) {
            $data[] = [
                'name' => 'Nước ép ' . $faker->word,
                'price' => $faker->numberBetween(10000, 4000),
                'brief' => $faker->text(300),
                'description' => $faker->text($maxNbChars = 2000),
                'category_id' => 5,
                'quantity' => $faker->numberBetween(50, 150),
            ];
        }
        for ($i = 0; $i < $limit; $i++) {
            $data[] = [
                'name' => 'Đồ đá xay ' . $faker->word,
                'price' => $faker->numberBetween(10000, 4000),
                'brief' => $faker->text(300),
                'description' => $faker->text($maxNbChars = 2000),
                'category_id' => 6,
                'quantity' => $faker->numberBetween(50, 150),
            ];
        }
        DB::table('products')->insert($data);
    }
}
