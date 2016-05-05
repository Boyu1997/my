<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->username = 'Jill';
        $user->last_name = 'Jill';
        $user->first_name = 'Jill';
        $user->email = 'Jill@harvard.edu';
        $user->cellphone = '6174601234';
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = new \App\User();
        $user->username = 'Jamal';
        $user->last_name = 'Jamal';
        $user->first_name = 'Jamal';
        $user->email = 'Jamal@harvard.edu';
        $user->cellphone = '6174604321';
        $user->password = \Hash::make('helloworld');
        $user->save();
    }
}
