<?php

use Illuminate\Database\Seeder;

class ContractsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contract = new \App\Contract();
        $contract->number = '20151201';
        $contract->sold_at = '2015/12/08';
        $contract->sold_type = 'hospital';
        $contract->amount = 1;
        $contract->total = 99000;
        $contract->save();

        $contract = new \App\Contract();
        $contract->number = '20160101';
        $contract->sold_at = '2016/01/24';
        $contract->sold_type = 'complement';
        $contract->amount = 1;
        $contract->total = 60000;
        $contract->save();

        $contract = new \App\Contract();
        $contract->number = '20160201';
        $contract->sold_at = '2016/02/20';
        $contract->sold_type = 'complement';
        $contract->amount = 1;
        $contract->total = 80000;
        $contract->save();

        $contract = new \App\Contract();
        $contract->number = '20160202';
        $contract->sold_at = '2016/02/20';
        $contract->sold_type = 'complement';
        $contract->amount = 1;
        $contract->total = 80000;
        $contract->save();

        $contract = new \App\Contract();
        $contract->number = '20160301';
        $contract->sold_at = '2016/03/09';
        $contract->sold_type = 'complement';
        $contract->amount = 1;
        $contract->total = 60000;
        $contract->save();

        $contract = new \App\Contract();
        $contract->number = '20160302';
        $contract->sold_at = '2016/03/15';
        $contract->sold_type = 'hospital';
        $contract->amount = 1;
        $contract->total = 118000;
        $contract->save();

        $contract = new \App\Contract();
        $contract->number = '20160401';
        $contract->sold_at = '2016/04/12';
        $contract->sold_type = 'agent';
        $contract->amount = 1;
        $contract->total = 65000;
        $contract->save();

        $contract = new \App\Contract();
        $contract->number = '20160402';
        $contract->sold_at = '2016/04/22';
        $contract->sold_type = 'agent';
        $contract->amount = 1;
        $contract->total = 65000;
        $contract->save();

        $contract = new \App\Contract();
        $contract->number = '20160501';
        $contract->sold_at = '2016/05/02';
        $contract->sold_type = 'agent';
        $contract->amount = 1;
        $contract->total = 85000;
        $contract->save();

        $contract = new \App\Contract();
        $contract->number = '20160502';
        $contract->sold_at = '2016/05/08';
        $contract->sold_type = 'complement';
        $contract->amount = 1;
        $contract->total = 80000;
        $contract->save();

        $contract = new \App\Contract();
        $contract->number = '20160503';
        $contract->sold_at = '2016/05/10';
        $contract->sold_type = 'complement';
        $contract->amount = 1;
        $contract->total = 60000;
        $contract->save();

        $contract = new \App\Contract();
        $contract->number = '20160504';
        $contract->sold_at = '2016/05/28';
        $contract->sold_type = 'complement';
        $contract->amount = 1;
        $contract->total = 80000;
        $contract->save();

        $contract = new \App\Contract();
        $contract->number = '20160601';
        $contract->sold_at = '2016/06/10';
        $contract->sold_type = 'agent';
        $contract->amount = 1;
        $contract->total = 85000;
        $contract->save();

        $contract = new \App\Contract();
        $contract->number = '20160602';
        $contract->sold_at = '2016/06/15';
        $contract->sold_type = 'agent';
        $contract->amount = 1;
        $contract->total = 65000;
        $contract->save();


    }
}
