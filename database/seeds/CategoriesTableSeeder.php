<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Cafe',
            ], [
                'name' => 'Trà',
            ], [
                'name' => 'Sinh Tố',
            ], [
                'name' => 'Soda - Mojito',
            ], [
                'name' => 'Nước Ép',
            ], [
                'name' => 'Đồ Đá Xay',
            ],
        ];

        DB::table('categories')->insert($data);
    }
}
