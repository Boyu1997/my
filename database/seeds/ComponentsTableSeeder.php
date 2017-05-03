<?php

use Illuminate\Database\Seeder;

class ComponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $component = new \App\Component();
        $component->name = '842-A5';
        $component->category = '水泵';
        $component->brand = 'CRI';
        $component->origin_serial_number = '2kd537rk';
        $component->factory_serial_number = 'vjhk';
        $component->arriving_date = '2017-02-15';
        $component->amount = 100;
        $component->save();

        $component = new \App\Component();
        $component->name = '64C-50';
        $component->category = '水泵';
        $component->brand = 'F3';
        $component->origin_serial_number = '56ytr';
        $component->factory_serial_number = 'y8gohuvkj';
        $component->arriving_date = '2017-01-20';
        $component->amount = 100;
        $component->save();

        $component = new \App\Component();
        $component->name = 'KK-4';
        $component->category = '铜管';
        $component->brand = 'KGEF';
        $component->origin_serial_number = 'bvm';
        $component->factory_serial_number = 'ghojk5trgv';
        $component->arriving_date = '2016-12-03';
        $component->amount = 500;
        $component->save();

        $component = new \App\Component();
        $component->name = 'CF9400';
        $component->category = '压缩机';
        $component->brand = 'SIKE';
        $component->origin_serial_number = 'fwguivkjjvr893';
        $component->factory_serial_number = '7r6ty8oui';
        $component->arriving_date = '2017-04-18';
        $component->amount = 100;
        $component->save();

        $component = new \App\Component();
        $component->name = 'CF6100';
        $component->category = '压缩机';
        $component->brand = 'SIKE';
        $component->origin_serial_number = '6r8t7iogjkrhcs';
        $component->factory_serial_number = '9u8y7itu';
        $component->arriving_date = '2016-02-20';
        $component->amount = 130;
        $component->save();
    }
}
