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
        $stock->remain_amount = 18;
        $stock->component_id = 1;
        $stock->save();

        $stock = new \App\Stock();
        $stock->remain_amount = 47;
        $stock->component_id = 2;
        $stock->save();

        $stock = new \App\Stock();
        $stock->remain_amount = 3;
        $stock->component_id = 3;
        $stock->save();

        $stock = new \App\Stock();
        $stock->remain_amount = 29;
        $stock->component_id = 4;
        $stock->save();

        $stock = new \App\Stock();
        $stock->remain_amount = 83;
        $stock->component_id = 5;
        $stock->save();

        $stock = new \App\Stock();
        $stock->remain_amount = 12;
        $stock->component_id = 6;
        $stock->save();

        $stock = new \App\Stock();
        $stock->remain_amount = 32;
        $stock->component_id = 7;
        $stock->save();
    }
}
