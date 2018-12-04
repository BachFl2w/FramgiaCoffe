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
        $id_categories = Category::all()->pluck('id')->toArray();
        $limit = 40;
        for ($i = 0; $i < $limit; $i++) {
            $data[] = [
                'name' => 'Trà Sữa ' . $faker->word,
                'price' => $faker->numberBetween(10000, 109999),
                'brief' => $faker->text(300),
                'description' => $faker->text($maxNbChars = 2000),
                'category_id' => $faker->randomElement($id_categories),
            ];
        }
        for ($i = 0; $i < $limit; $i++) {
            $data[] = [
                'name' => 'Cà Phê ' . $faker->word,
                'price' => $faker->numberBetween(1, 400),
                'brief' => $faker->text(300),
                'description' => $faker->text($maxNbChars = 2000),
                'category_id' => $faker->randomElement($id_categories),
            ];
        }
        DB::table('products')->insert($data);
    }
}
