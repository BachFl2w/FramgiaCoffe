<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
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
                'receiver' => 'Nguyen Van A',
                'user_id' => 1,
                'order_time' => '2018-11-01 09:39:12',
                'order_place' => 'Hadico',
                'order_phone' => '0123456789',
                'status' => 0,
                'Note' => 'Giao hanh som',
            ], [
                'receiver' => 'Nguyen Van B',
                'user_id' => 1,
                'order_time' => '2018-11-02 09:39:12',
                'order_place' => 'Hadico',
                'order_phone' => '0123456789',
                'status' => 0,
                'Note' => 'Note js',
            ],
        ];

        DB::table('orders')->insert($data);
    }
}
