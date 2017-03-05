<?php

use Illuminate\Database\Seeder;

class PrivilegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $privilege = new \App\Privilege();
        $privilege->master_admin = '1';
        $privilege->stock = '0';
        $privilege->produce = '0';
        $privilege->install = '0';
        $privilege->maintenance = '0';
        $privilege->trip = '0';
        $privilege->save();

        $privilege = new \App\Privilege();
        $privilege->master_admin = '0';
        $privilege->stock = '1';
        $privilege->produce = '1';
        $privilege->install = '1';
        $privilege->maintenance = '1';
        $privilege->trip = '1';
        $privilege->save();

        $privilege = new \App\Privilege();
        $privilege->master_admin = '0';
        $privilege->stock = '0';
        $privilege->produce = '0';
        $privilege->install = '1';
        $privilege->maintenance = '1';
        $privilege->trip = '0';
        $privilege->save();
    }
}
