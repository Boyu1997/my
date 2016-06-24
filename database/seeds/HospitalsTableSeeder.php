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
        $hospital->name = 'Hospital1';
        $hospital->nation = 'China';
        $hospital->province = 'Zhejiang';
        $hospital->city = 'Hangzhou';
        $hospital->address = 'jsvbhhbjvknc';
        $hospital->phone_number = '123456';
        $hospital->fax = '123456';
        $hospital->remark = 'pvdojgbkvjk';
        $hospital->save();

        $hospital = new \App\Hospital();
        $hospital->name = 'Hospital2';
        $hospital->nation = 'China';
        $hospital->province = 'Hebei';
        $hospital->city = 'Tangshan';
        $hospital->address = 'jkvdbnj';
        $hospital->phone_number = '123456';
        $hospital->fax = '123456';
        $hospital->remark = 'dnscjijfkvnj';
        $hospital->save();
    }
}
