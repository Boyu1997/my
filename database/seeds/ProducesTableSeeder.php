<?php

use Illuminate\Database\Seeder;

class ProducesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produce = new \App\Produce();
        $produce->model = 'M-1';
        $produce->serial_number = '201512002P';
        $produce->start_at = '2016/11/27';
        $produce->finished_at = '2015/12/02';
        $produce->employee_id = '4';
        $produce->contract_id = '1';
        $produce->install_id = '1';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-8';
        $produce->serial_number = '20160123Y';
        $produce->start_at = '2016/01/17';
        $produce->finished_at = '2016/01/23';
        $produce->employee_id = '3';
        $produce->contract_id = '2';
        $produce->install_id = '2';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-6';
        $produce->serial_number = '20160208W';
        $produce->start_at = '2016/02/02';
        $produce->finished_at = '2016/02/08';
        $produce->employee_id = '2';
        $produce->contract_id = '3';
        $produce->install_id = '3';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-6';
        $produce->serial_number = '20160220R';
        $produce->start_at = '2016/02/15';
        $produce->finished_at = '2016/02/20';
        $produce->employee_id = '4';
        $produce->contract_id = '4';
        $produce->install_id = '4';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-1';
        $produce->serial_number = '20160301K';
        $produce->start_at = '2016/02/24';
        $produce->finished_at = '2016/03/01';
        $produce->employee_id = '3';
        $produce->contract_id = '5';
        $produce->install_id = '5';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-1';
        $produce->serial_number = '20160313T';
        $produce->start_at = '2016/03/09';
        $produce->finished_at = '2016/03/13';
        $produce->employee_id = '2';
        $produce->contract_id = '6';
        $produce->install_id = '6';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-8';
        $produce->serial_number = '20160411A';
        $produce->start_at = '2016/04/06';
        $produce->finished_at = '2016/04/11';
        $produce->employee_id = '4';
        $produce->contract_id = '7';
        $produce->install_id = '7';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-1';
        $produce->serial_number = '20160419Q';
        $produce->start_at = '2016/04/12';
        $produce->finished_at = '2016/04/19';
        $produce->employee_id = '4';
        $produce->contract_id = '8';
        $produce->install_id = '8';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-1';
        $produce->serial_number = '20160429K';
        $produce->start_at = '2016/04/20';
        $produce->finished_at = '2016/04/29';
        $produce->employee_id = '1';
        $produce->contract_id = '9';
        $produce->install_id = '9';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-0';
        $produce->serial_number = '20160506F';
        $produce->start_at = '2016/05/02';
        $produce->finished_at = '2016/05/06';
        $produce->employee_id = '4';
        $produce->contract_id = '10';
        $produce->install_id = '10';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-8';
        $produce->serial_number = '20160509E';
        $produce->start_at = '2016/05/03';
        $produce->finished_at = '2016/05/09';
        $produce->employee_id = '3';
        $produce->contract_id = '11';
        $produce->install_id = '11';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-8';
        $produce->serial_number = '20160520G';
        $produce->start_at = '2016/05/13';
        $produce->finished_at = '2016/05/20';
        $produce->employee_id = '3';
        $produce->contract_id = '12';
        $produce->install_id = '12';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-2';
        $produce->serial_number = '20160602K';
        $produce->start_at = '2016/05/26';
        $produce->finished_at = '2016/06/02';
        $produce->employee_id = '4';
        $produce->contract_id = '13';
        $produce->install_id = '13';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-2';
        $produce->serial_number = '20160613K';
        $produce->start_at = '2016/06/08';
        $produce->finished_at = '2016/06/13';
        $produce->employee_id = '3';
        $produce->contract_id = '14';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-2';
        $produce->serial_number = '20160615K';
        $produce->start_at = '2016/06/08';
        $produce->finished_at = '2016/06/15';
        $produce->employee_id = '1';
        $produce->save();
    }
}
