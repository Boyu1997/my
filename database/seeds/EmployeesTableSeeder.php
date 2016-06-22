<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = new \App\Employee();
        $employee->position = 'admin';
        $employee->company_email = 'Jill@company.com';
        $employee->company_cellphone = '6174605678';
        $employee->privilege_id = '1';
        $employee->save();

        $employee = new \App\Employee();
        $employee->position = 'engineer';
        $employee->company_email = 'Jamal@company.com';
        $employee->company_cellphone = '6174608765';
        $employee->privilege_id = '2';
        $employee->wage_id = '1';
        $employee->save();

        $employee = new \App\Employee();
        $employee->position = 'officer';
        $employee->company_email = 'Mike@company.com';
        $employee->company_cellphone = '6173300518';
        $employee->privilege_id = '3';
        $employee->wage_id = '2';
        $employee->save();

        $employee = new \App\Employee();
        $employee->position = 'engineer';
        $employee->company_email = 'Lisa@company.com';
        $employee->company_cellphone = '6170509423';
        $employee->privilege_id = '2';
        $employee->wage_id = '3';
        $employee->save();
    }
}
