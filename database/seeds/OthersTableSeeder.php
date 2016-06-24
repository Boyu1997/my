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
        $other->name = 'Lab';
        $other->nation = 'China';
        $other->province = 'Jiangsu';
        $other->city = 'Nanjing';
        $other->address = 'jsvbhhbjvknc';
        $other->phone_number = '123456';
        $other->fax = '123456';
        $other->remark = 'dbjvkdfnsnhgs';
        $other->save();

        $other = new \App\Other();
        $other->name = 'Army';
        $other->nation = 'China';
        $other->province = 'Beijing';
        $other->city = 'Beijing';
        $other->address = 'jkvdbnj';
        $other->phone_number = '123456';
        $other->fax = '123456';
        $other->remark = 'skbdcafojtbgn';
        $other->save();
    }
}
