<?php

use Illuminate\Database\Seeder;

class HospitalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hospital = new \App\Hospital();
        $hospital->name = '医院1';
        $hospital->nation = '中国';
        $hospital->province = '河北';
        $hospital->city = '石家庄';
        $hospital->address = 'jsvbhhbjvknc';
        $hospital->phone_number = '123456';
        $hospital->fax = '123456';
        $hospital->remark = 'dbjvkdfnsnhgs';
        $hospital->save();

        $hospital = new \App\Hospital();
        $hospital->name = '医院2';
        $hospital->nation = '中国';
        $hospital->province = '湖南';
        $hospital->city = '长沙';
        $hospital->address = 'jkvdbnj';
        $hospital->phone_number = '123456';
        $hospital->fax = '123456';
        $hospital->remark = 'skbdcafojtbgn';
        $hospital->save();
    }
}
