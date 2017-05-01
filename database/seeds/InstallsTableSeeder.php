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

        $install = new \App\Install();
        $install->specification = 'shfgnkjbsjnksang';
        $install->start_at = '2016/01/26';
        $install->end_at = '2016/01/29';
        $install->person_hour = '5';
        $install->employee_id = '4';
        $install->save();

        $install = new \App\Install();
        $install->specification = 'opkhbjsfknndfbjkn';
        $install->start_at = '2016/02/27';
        $install->end_at = '2016/03/03';
        $install->person_hour = '6';
        $install->employee_id = '3';
        $install->save();

        $install = new \App\Install();
        $install->specification = 'opkhbjsfknndfbjkn';
        $install->start_at = '2016/02/23';
        $install->end_at = '2016/02/26';
        $install->person_hour = '4';
        $install->employee_id = '3';
        $install->save();

        $install = new \App\Install();
        $install->specification = 'awejfbsvbjklfdnbovf';
        $install->start_at = '2016/03/15';
        $install->end_at = '2016/03/18';
        $install->person_hour = '5';
        $install->employee_id = '4';
        $install->save();

        $install = new \App\Install();
        $install->specification = 'vjklngskldbnlxnvzlt';
        $install->start_at = '2016/03/17';
        $install->end_at = '2016/03/21';
        $install->person_hour = '5';
        $install->employee_id = '2';
        $install->save();

        $install = new \App\Install();
        $install->specification = 'bfijpncjbnjsdknzabgn';
        $install->start_at = '2016/04/14';
        $install->end_at = '2016/04/18';
        $install->person_hour = '5';
        $install->employee_id = '4';
        $install->save();

        $install = new \App\Install();
        $install->specification = 'jgdsbvksvsalkjfrbfvbshjxcz';
        $install->start_at = '2016/04/28';
        $install->end_at = '2016/05/02';
        $install->person_hour = '5';
        $install->employee_id = '4';
        $install->save();

        $install = new \App\Install();
        $install->specification = 'fkvnjdsbnsdfng';
        $install->start_at = '2016/05/04';
        $install->end_at = '2016/05/07';
        $install->person_hour = '5';
        $install->employee_id = '3';
        $install->save();

        $install = new \App\Install();
        $install->specification = 'vcbnvrvdjbskabjkv';
        $install->start_at = '2016/05/12';
        $install->end_at = '2016/05/16';
        $install->person_hour = '5';
        $install->employee_id = '4';
        $install->save();

        $install = new \App\Install();
        $install->specification = 'csbnmdjkvsgbjlbnagejnvv';
        $install->start_at = '2016/05/12';
        $install->end_at = '2016/05/17';
        $install->person_hour = '6';
        $install->employee_id = '2';
        $install->save();

        $install = new \App\Install();
        $install->specification = 'znvjmbjvdsjksdngfjkbmnaatobn';
        $install->start_at = '2016/06/01';
        $install->end_at = '2016/06/05';
        $install->person_hour = '5';
        $install->employee_id = '1';
        $install->save();

        $install = new \App\Install();
        $install->specification = 'vbkjeafijvefnvldd';
        $install->start_at = '2016/06/12';
        $install->person_hour = '5';
        $install->employee_id = '4';
        $install->save();
    }
}
