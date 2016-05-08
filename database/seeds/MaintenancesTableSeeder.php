<?php

use Illuminate\Database\Seeder;

class MaintenancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maintenance = new \App\Maintenance();
        $maintenance->type = 'defect';
        $maintenance->specification = 'snklfbdsbzfklbn';
        $maintenance->start_at = '2016/03/13';
        $maintenance->end_at = '2016/03/13';
        $maintenance->employee_id = '1';
        $maintenance->produce_id = '10';
        $maintenance->save();

        $maintenance = new \App\Maintenance();
        $maintenance->type = 'routine';
        $maintenance->specification = 'bdlnsjgknldkhnog';
        $maintenance->start_at = '2016/05/04';
        $maintenance->end_at = '2016/05/05';
        $maintenance->employee_id = '2';
        $maintenance->produce_id = '6';
        $maintenance->save();

        $maintenance = new \App\Maintenance();
        $maintenance->type = 'routine';
        $maintenance->specification = '480ti580f9u2';
        $maintenance->start_at = '2016/04/18';
        $maintenance->end_at = '2016/04/18';
        $maintenance->employee_id = '2';
        $maintenance->produce_id = '2';
        $maintenance->save();
    }
}
