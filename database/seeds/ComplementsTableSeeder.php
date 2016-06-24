<?php

use Illuminate\Database\Seeder;

class ComplementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $complement = new \App\Complement();
        $complement->name = '配套商1';
        $complement->nation = '中国';
        $complement->province = '河北';
        $complement->city = '石家庄';
        $complement->address = 'jsvbhhbjvknc';
        $complement->phone_number = '123456';
        $complement->fax = '123456';
        $complement->remark = 'dbjvkdfnsnhgs';
        $complement->save();

        $complement = new \App\Complement();
        $complement->name = '配套商2';
        $complement->nation = '中国';
        $complement->province = '湖南';
        $complement->city = '长沙';
        $complement->address = 'jkvdbnj';
        $complement->phone_number = '123456';
        $complement->fax = '123456';
        $complement->remark = 'skbdcafojtbgn';
        $complement->save();
    }
}
