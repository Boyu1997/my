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
        $privilege->check_trip = '1';
        $privilege->create_produce = '1';
        $privilege->create_install = '1';
        $privilege->create_maintenance = '1';
        $privilege->create_customer = '1';
        $privilege->save();
    }
}
