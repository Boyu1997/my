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
        $produce->serial_number = '201604002Y';
        $produce->finished_at = '2016/04/02';
        $produce->sold_at = '2016/04/28';
        $produce->sold_to = 'XMZ';
        $produce->employee_id = '1';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-1';
        $produce->serial_number = '20160321E';
        $produce->finished_at = '2016/03/01';
        $produce->sold_at = '2016/03/15';
        $produce->sold_to = 'XMZ';
        $produce->employee_id = '3';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-4';
        $produce->serial_number = '20160414S';
        $produce->finished_at = '2016/04/14';
        $produce->sold_at = '2016/04/20';
        $produce->sold_to = 'GE';
        $produce->employee_id = '3';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-2';
        $produce->serial_number = '20160427S';
        $produce->finished_at = '2016/04/27';
        $produce->sold_at = '2016/05/01';
        $produce->sold_to = 'ICE';
        $produce->employee_id = '2';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-1';
        $produce->serial_number = '20160218W';
        $produce->finished_at = '2016/02/18';
        $produce->sold_at = '2016/03/07';
        $produce->sold_to = 'GE';
        $produce->employee_id = '3';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-3';
        $produce->serial_number = '20160403L';
        $produce->finished_at = '2016/04/03';
        $produce->sold_at = '2016/04/10';
        $produce->sold_to = 'XMZ';
        $produce->employee_id = '2';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-7';
        $produce->serial_number = '20160120K';
        $produce->finished_at = '2016/01/20';
        $produce->sold_at = '2016/02/08';
        $produce->sold_to = 'HPT';
        $produce->employee_id = '4';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-5';
        $produce->serial_number = '201504070K';
        $produce->finished_at = '2015/04/07';
        $produce->sold_at = '2015/04/13';
        $produce->sold_to = 'XMZ';
        $produce->employee_id = '2';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-0';
        $produce->serial_number = '20160224';
        $produce->finished_at = '2016/02/24';
        $produce->sold_at = '2016/03/17';
        $produce->sold_to = 'GE';
        $produce->employee_id = '3';
        $produce->save();

        $produce = new \App\Produce();
        $produce->model = 'M-9';
        $produce->serial_number = '201512180K';
        $produce->finished_at = '2015/12/18';
        $produce->sold_at = '2016/01/04';
        $produce->sold_to = 'HPT';
        $produce->employee_id = '2';
        $produce->save();
    }
}
