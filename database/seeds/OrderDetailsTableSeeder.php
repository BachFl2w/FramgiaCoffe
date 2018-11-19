<?php

use Illuminate\Database\Seeder;

class OrderDetailsTableSeeder extends Seeder
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
                'order_id' => 1,
                'product_id' => 1,
                'size_id' => 2,
                'quantity' => 8,
            ], [
                'order_id' => 1,
                'product_id' => 4,
                'size_id' => 1,
                'quantity' => 4,
            ], [
                'order_id' => 2,
                'product_id' => 3,
                'size_id' => 3,
                'quantity' => 2,
            ], [
                'order_id' => 2,
                'product_id' => 6,
                'size_id' => 2,
                'quantity' => 1,
            ]
        ];

        DB::table('order_details')->insert($data);
    }
}
