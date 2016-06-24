<?php

use Illuminate\Database\Seeder;

class AgentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agent = new \App\Agent();
        $agent->name = '代理1';
        $agent->nation = '中国';
        $agent->province = '河北';
        $agent->city = '石家庄';
        $agent->address = 'jsvbhhbjvknc';
        $agent->phone_number = '123456';
        $agent->fax = '123456';
        $agent->remark = 'dbjvkdfnsnhgs';
        $agent->save();

        $agent = new \App\Agent();
        $agent->name = '代理2';
        $agent->nation = '中国';
        $agent->province = '湖南';
        $agent->city = '长沙';
        $agent->address = 'jkvdbnj';
        $agent->phone_number = '123456';
        $agent->fax = '123456';
        $agent->remark = 'skbdcafojtbgn';
        $agent->save();
    }
}
