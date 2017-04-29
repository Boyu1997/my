<?php

use Illuminate\Database\Seeder;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stock = new \App\Stock();
        $stock->name = '842-A5';
        $stock->category = '水冷机';
        $stock->brand = 'CRI';
        $stock->serial_number = '2kd537rk';
        $stock->purchase_day = '2017/02/15';
        $stock->purchase_amount = 100;
        $stock->remain_amount = 89;
        $stock->save();

        $stock = new \App\Stock();
        $stock->name = '64C-9';
        $stock->category = '水冷机';
        $stock->brand = 'PER';
        $stock->serial_number = 'jib5e6h3ntgk454';
        $stock->purchase_day = '2016/12/27';
        $stock->purchase_amount = 500;
        $stock->remain_amount = 127;
        $stock->save();

        $stock = new \App\Stock();
        $stock->name = '42R';
        $stock->category = '水泵';
        $stock->brand = 'CRI';
        $stock->serial_number = '45bk34bs';
        $stock->purchase_day = '2017/03/8';
        $stock->purchase_amount = 200;
        $stock->remain_amount = 12;
        $stock->save();

        $stock = new \App\Stock();
        $stock->name = 'CCR5';
        $stock->category = '水冷机';
        $stock->brand = 'CRI';
        $stock->serial_number = '4tgnlkfa';
        $stock->purchase_day = '2017/01/08';
        $stock->purchase_amount = 100;
        $stock->remain_amount = 0;
        $stock->save();
    }
}
