<?php

use Illuminate\Database\Seeder;
use App\OrderStatus;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->delete();
        $orders_status = [

            [
                'en'=> 'Accepted',
                'ar'=> 'مقبول'
            ],
            [
                'en'=> 'Rejected',
                'ar'=> 'مرفوض'
            ],
            [
                'en'=> 'implemented',
                'ar'=> 'منفذ',
            ],
        ];

        foreach($orders_status as  $order_status){
            OrderStatus ::create(['StatusName' => $order_status]);
        }


    }
}
