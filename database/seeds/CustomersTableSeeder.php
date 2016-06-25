<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new \App\Customer();
        $customer->name = 'Hospital1';
        $customer->nation = 'China';
        $customer->province = 'Zhejiang';
        $customer->city = 'Hangzhou';
        $customer->address = 'jsvbhhbjvknc';
        $customer->phone_number = '123456';
        $customer->fax = '123456';
        $customer->remark = 'pvdojgbkvjk';
        $customer->save();

        $customer = new \App\Customer();
        $customer->name = 'Hospital2';
        $customer->nation = 'China';
        $customer->province = 'Hebei';
        $customer->city = 'Tangshan';
        $customer->address = 'jkvdbnj';
        $customer->phone_number = '123456';
        $customer->fax = '123456';
        $customer->remark = 'dnscjijfkvnj';
        $customer->save();
    }
}
