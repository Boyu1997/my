<?php

use Illuminate\Database\Seeder;

class CompetitorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $competitor = new \App\Competitor();
        $competitor->name = '对手1';
        $competitor->nation = '中国';
        $competitor->province = '河北';
        $competitor->city = '石家庄';
        $competitor->address = 'jsvbhhbjvknc';
        $competitor->phone_number = '123456';
        $competitor->fax = '123456';
        $competitor->remark = 'dbjvkdfnsnhgs';
        $competitor->save();

        $competitor = new \App\Competitor();
        $competitor->name = '对手2';
        $competitor->nation = '中国';
        $competitor->province = '湖南';
        $competitor->city = '长沙';
        $competitor->address = 'jkvdbnj';
        $competitor->phone_number = '123456';
        $competitor->fax = '123456';
        $competitor->remark = 'skbdcafojtbgn';
        $competitor->save();
    }
}
