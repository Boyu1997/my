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
        $privilege->employee_id = '1';
        $privilege->master_admin = '1';
        $privilege->check_trip = '1';
        $privilege->create_produce = '1';
        $privilege->create_install = '1';
        $privilege->create_maintenance = '1';
        $privilege->create_customer = '1';
        $privilege->save();

        $privilege = new \App\Privilege();
        $privilege->employee_id = '2';
        $privilege->master_admin = '0';
        $privilege->check_trip = '0';
        $privilege->create_produce = '0';
        $privilege->create_install = '0';
        $privilege->create_maintenance = '0';
        $privilege->create_customer = '0';
        $privilege->save();
    }
}
