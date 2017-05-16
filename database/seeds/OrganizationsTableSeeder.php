<?php

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organization = new \App\Organization();
        $organization->category = 'Agent';
        $organization->name = 'Agent1';
        $organization->nation = 'China';
        $organization->province = 'Hebei';
        $organization->city = 'Shijiazhuang';
        $organization->address = 'jsvbhhbjvknc';
        $organization->phone_number = '123456';
        $organization->fax = '123456';
        $organization->remark = 'osvhndkl';
        $organization->save();

        $organization = new \App\Organization();
        $organization->category = 'Agent';
        $organization->name = 'Agent2';
        $organization->nation = 'China';
        $organization->province = 'Hunan';
        $organization->city = 'Changsha';
        $organization->address = 'jkvdbnj';
        $organization->phone_number = '123456';
        $organization->fax = '123456';
        $organization->remark = 'nkscjfklndovkm';
        $organization->save();

        $organization = new \App\Organization();
        $organization->category = 'Complement';
        $organization->name = 'Complement1';
        $organization->nation = 'USA';
        $organization->province = 'California';
        $organization->city = 'San Jose';
        $organization->address = 'jsvbhhbjvknc';
        $organization->phone_number = '123456';
        $organization->fax = '123456';
        $organization->remark = 'bqkjfbdjvbmn';
        $organization->save();

        $organization = new \App\Organization();
        $organization->category = 'Complement';
        $organization->name = 'Complement2';
        $organization->nation = 'China';
        $organization->province = 'Guangdong';
        $organization->city = 'Guangzhou';
        $organization->address = 'jkvdbnj';
        $organization->phone_number = '123456';
        $organization->fax = '123456';
        $organization->remark = 'fjknvpseofm';
        $organization->save();

        $organization = new \App\Organization();
        $organization->category = 'Customer';
        $organization->name = 'Hospital1';
        $organization->nation = 'China';
        $organization->province = 'Zhejiang';
        $organization->city = 'Hangzhou';
        $organization->address = 'jsvbhhbjvknc';
        $organization->phone_number = '123456';
        $organization->fax = '123456';
        $organization->remark = 'pvdojgbkvjk';
        $organization->save();

        $organization = new \App\Organization();
        $organization->category = 'customer';
        $organization->name = 'Hospital2';
        $organization->nation = 'China';
        $organization->province = 'Hebei';
        $organization->city = 'Tangshan';
        $organization->address = 'jkvdbnj';
        $organization->phone_number = '123456';
        $organization->fax = '123456';
        $organization->remark = 'dnscjijfkvnj';
        $organization->save();

        $organization = new \App\Organization();
        $organization->category = 'Lab';
        $organization->name = 'FUJI Lab';
        $organization->nation = 'China';
        $organization->province = 'Jiangsu';
        $organization->city = 'Nanjing';
        $organization->address = 'jsvbhhbjvknc';
        $organization->phone_number = '123456';
        $organization->fax = '123456';
        $organization->remark = 'dbjvkdfnsnhgs';
        $organization->save();

        $organization = new \App\Organization();
        $organization->category = 'Army';
        $organization->name = '304';
        $organization->nation = 'China';
        $organization->province = 'Beijing';
        $organization->city = 'Beijing';
        $organization->address = 'jkvdbnj';
        $organization->phone_number = '123456';
        $organization->fax = '123456';
        $organization->remark = 'skbdcafojtbgn';
        $organization->save();

        $organization = new \App\Organization();
        $organization->category = 'Competitor';
        $organization->name = 'Competitor1';
        $organization->nation = 'China';
        $organization->province = 'Shanghai';
        $organization->city = 'Shanghai';
        $organization->address = 'jsvbhhbjvknc';
        $organization->phone_number = '123456';
        $organization->fax = '123456';
        $organization->remark = 'hwrnjvicm';
        $organization->save();

        $organization = new \App\Organization();
        $organization->category = 'Competitor';
        $organization->name = 'Competitor2';
        $organization->nation = 'China';
        $organization->province = 'Henan';
        $organization->city = 'Zhangzhou';
        $organization->address = 'jkvdbnj';
        $organization->phone_number = '123456';
        $organization->fax = '123456';
        $organization->remark = 'kjhbvcfgvcxfbn';
        $organization->save();
    }
}
