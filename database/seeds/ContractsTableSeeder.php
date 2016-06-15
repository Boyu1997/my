<?php

use Illuminate\Database\Seeder;

class ContractsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contract = new \App\Contract();
        $contract->number = '20151201';
        $contract->sold_at = '2015/12/08';
        $contract->sold_type = 'hospital';
        $contract->amount = 1;
        $contract->save();
    }
}
