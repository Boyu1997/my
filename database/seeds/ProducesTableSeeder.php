<?php

use Illuminate\Database\Seeder;

class ProducesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produce = new \App\Produce();
        $produce->model = 'M-1';
        $produce->serial_number = '201512002Y';
        $produce->finished_at = '2015/12/02';
        $produce->employee_id = '4';
        $produce->contract_id = '1';
        $produce->install_id = '1';
        $produce->save();
    }
}
