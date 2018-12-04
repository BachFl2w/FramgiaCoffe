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
                'order_place' => 'Handico',
                'order_phone' => '0123456789',
                'status' => 0,
                'Note' => 'Giao hàng sớm',
            ], [
                'receiver' => 'Nguyen Van B',
                'user_id' => 1,
                'order_time' => '2018-11-02 09:39:12',
                'order_place' => 'Handico',
                'order_phone' => '0123456789',
                'status' => -1,
                'Note' => 'Giao hàng muộn',
            ], [
                'receiver' => 'Nguyen Van A',
                'user_id' => 1,
                'order_time' => '2018-11-05 09:39:12',
                'order_place' => 'Handico',
                'order_phone' => '0123456789',
                'status' => 1,
                'Note' => 'Giao hàng muộn 1',
            ], [
                'receiver' => 'Nguyen Van C',
                'user_id' => 2,
                'order_time' => '2018-11-02 09:39:12',
                'order_place' => 'Handico ABCXYZ',
                'order_phone' => '0123456789',
                'status' => 1,
                'Note' => 'Van chuyen can than',
            ],
        ];

        DB::table('orders')->insert($data);
    }
}
