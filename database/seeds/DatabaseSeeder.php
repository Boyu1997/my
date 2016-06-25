<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PrivilegesTableSeeder::class);
        $this->call(WagesTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(InstallsTableSeeder::class);
        $this->call(ContractsTableSeeder::class);
        $this->call(ProducesTableSeeder::class);
        $this->call(AgentsTableSeeder::class);
        $this->call(ComplementsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(OthersTableSeeder::class);
        $this->call(CompetitorsTableSeeder::class);
        $this->call(SalesTableSeeder::class);
    }
}
