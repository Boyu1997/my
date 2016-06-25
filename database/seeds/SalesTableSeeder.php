<?php

use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sale = new \App\Sale();
        $sale->status = 'finished';
        $sale->classification = 'other';
        $sale->specification = 'vkxndsjkbndaigos';
        $sale->expect_model = 'M-1';
        $sale->expect_amount = 2;
        $sale->expect_price = 80000;
        $sale->expect_sold_date = '2016/02/17';
        $sale->result = 'win';
        $sale->winning_company = '艾美康';
        $sale->sold_model = 'M-1';
        $sale->sold_amount = 2;
        $sale->sold_price = 75000;
        $sale->agent_id = 1;
        $sale->customer_id = 2;
        $sale->employee_id = 3;
        $sale->save();

        $sale = new \App\Sale();
        $sale->status = 'new';
        $sale->classification = 'regular';
        $sale->specification = 'bvndmrnhos';
        $sale->customer_id = 2;
        $sale->employee_id = 3;
        $sale->save();

        $sale = new \App\Sale();
        $sale->status = 'ongoing';
        $sale->classification = 'other';
        $sale->specification = 'bfdbgsefvtejkjhgbfgch';
        $sale->expect_model = 'M-1';
        $sale->expect_amount = 2;
        $sale->expect_price = 80000;
        $sale->expect_sold_date = '2016/02/17';
        $sale->agent_id = 1;
        $sale->complement_id = 2;
        $sale->customer_id = 2;
        $sale->employee_id = 3;
        $sale->save();
    }
}
