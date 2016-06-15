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
        $install->start_at = '2015/12/19';
        $install->end_at = '2015/12/23';
        $install->person_hour = '5';
        $install->employee_id = '2';
        $install->save();
    }
}
