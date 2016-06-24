<?php

use Illuminate\Database\Seeder;

class OthersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $other = new \App\Other();
        $other->name = '实验室';
        $other->nation = '中国';
        $other->province = '河北';
        $other->city = '石家庄';
        $other->address = 'jsvbhhbjvknc';
        $other->phone_number = '123456';
        $other->fax = '123456';
        $other->remark = 'dbjvkdfnsnhgs';
        $other->save();

        $other = new \App\Other();
        $other->name = '设计院';
        $other->nation = '中国';
        $other->province = '湖南';
        $other->city = '长沙';
        $other->address = 'jkvdbnj';
        $other->phone_number = '123456';
        $other->fax = '123456';
        $other->remark = 'skbdcafojtbgn';
        $other->save();
    }
}
