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
        $user->username = 'Jill253';
        $user->last_name = 'Bur';
        $user->first_name = 'Jill';
        $user->email = 'Jill@harvard.edu';
        $user->cellphone = '6174601234';
        $user->password = \Hash::make('helloworld');
        $user->employee_id = '1';
        $user->save();

        $user = new \App\User();
        $user->username = 'Jamal052';
        $user->last_name = 'Leo';
        $user->first_name = 'Jamal';
        $user->email = 'Jamal@harvard.edu';
        $user->cellphone = '6174604321';
        $user->password = \Hash::make('helloworld');
        $user->employee_id = '2';
        $user->save();

        $user = new \App\User();
        $user->username = 'Mike712';
        $user->last_name = 'Sdive';
        $user->first_name = 'Mike';
        $user->email = 'Mike@harvard.edu';
        $user->cellphone = '6174600751';
        $user->password = \Hash::make('helloworld');
        $user->employee_id = '3';
        $user->save();

        $user = new \App\User();
        $user->username = 'Lisa204';
        $user->last_name = 'Stell';
        $user->first_name = 'Lisa';
        $user->email = 'Lisa@harvard.edu';
        $user->cellphone = '6174601524';
        $user->password = \Hash::make('helloworld');
        $user->employee_id = '4';
        $user->save();
    }
}
