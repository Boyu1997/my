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
        $competitor->name = 'Competitor1';
        $competitor->nation = 'China';
        $competitor->province = 'Shanghai';
        $competitor->city = 'Shanghai';
        $competitor->address = 'jsvbhhbjvknc';
        $competitor->phone_number = '123456';
        $competitor->fax = '123456';
        $competitor->remark = 'hwrnjvicm';
        $competitor->save();

        $competitor = new \App\Competitor();
        $competitor->name = 'Competitor2';
        $competitor->nation = 'China';
        $competitor->province = 'Henan';
        $competitor->city = 'Zhangzhou';
        $competitor->address = 'jkvdbnj';
        $competitor->phone_number = '123456';
        $competitor->fax = '123456';
        $competitor->remark = 'kjhbvcfgvcxfbn';
        $competitor->save();
    }
}
