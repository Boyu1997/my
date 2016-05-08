<?php

use Illuminate\Database\Seeder;

class InstallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $install = new \App\Install();
        $install->specification = 'jhdtklhjsnbpoipnaklfljb';
        $install->start_at = '2016/04/29';
        $install->end_at = '2016/05/03';
        $install->employee_id = '2';
        $install->produce_id = '3';
        $install->save();

        $install = new \App\Install();
        $install->specification = 'klhdshknkbasar';
        $install->start_at = '2016/03/18';
        $install->end_at = '2016/03/23';
        $install->employee_id = '1';
        $install->produce_id = '2';
        $install->save();

        $install = new \App\Install();
        $install->specification = 'gkg9whj69husbbfh';
        $install->start_at = '2016/01/09';
        $install->end_at = '2016/01/12';
        $install->employee_id = '4';
        $install->produce_id = '10';
        $install->save();

        $install = new \App\Install();
        $install->specification = 'g99uti98huj9ry';
        $install->start_at = '2016/04/25';
        $install->end_at = '2016/05/01';
        $install->employee_id = '3';
        $install->produce_id = '6';
        $install->save();
    }
}
