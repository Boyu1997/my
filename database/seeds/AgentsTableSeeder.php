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
        $agent->name = 'Agent1';
        $agent->nation = 'China';
        $agent->province = 'Hebei';
        $agent->city = 'Shijiazhuang';
        $agent->address = 'jsvbhhbjvknc';
        $agent->phone_number = '123456';
        $agent->fax = '123456';
        $agent->remark = 'osvhndkl';
        $agent->save();

        $agent = new \App\Agent();
        $agent->name = 'Agent2';
        $agent->nation = 'China';
        $agent->province = 'Hunan';
        $agent->city = 'Changsha';
        $agent->address = 'jkvdbnj';
        $agent->phone_number = '123456';
        $agent->fax = '123456';
        $agent->remark = 'nkscjfklndovkm';
        $agent->save();
    }
}
