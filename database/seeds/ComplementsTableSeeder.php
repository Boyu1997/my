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
        $complement->name = 'Complement1';
        $complement->nation = 'USA';
        $complement->province = 'California';
        $complement->city = 'San Jose';
        $complement->address = 'jsvbhhbjvknc';
        $complement->phone_number = '123456';
        $complement->fax = '123456';
        $complement->remark = 'bqkjfbdjvbmn';
        $complement->save();

        $complement = new \App\Complement();
        $complement->name = 'Complement2';
        $complement->nation = 'China';
        $complement->province = 'Guangdong';
        $complement->city = 'Guangzhou';
        $complement->address = 'jkvdbnj';
        $complement->phone_number = '123456';
        $complement->fax = '123456';
        $complement->remark = 'fjknvpseofm';
        $complement->save();
    }
}
