<?php

use Illuminate\Database\Seeder;

class WagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wage = new \App\Wage();
        $wage->monthly_base = '1600';
        $wage->attendance_stander = '800';
        $wage->attendance_deduction = '100';
        $wage->cellphone_grant = '100';
        $wage->meal_grant = '300';
        $wage->person_hour_standard = '100';
        $wage->trip_allowance_standard = '260';
        $wage->piece_rate_stander = '300';
        $wage->piece_rate_award_stander = '100';
        $wage->piece_rate_award_requirement = '6';
        $wage->save();

        $wage = new \App\Wage();
        $wage->monthly_base = '3600';
        $wage->attendance_stander = '1200';
        $wage->attendance_deduction = '200';
        $wage->cellphone_grant = '300';
        $wage->meal_grant = '800';
        $wage->person_hour_standard = '100';
        $wage->trip_allowance_standard = '160';
        $wage->piece_rate_stander = '300';
        $wage->piece_rate_award_stander = '100';
        $wage->piece_rate_award_requirement = '6';
        $wage->save();

        $wage = new \App\Wage();
        $wage->monthly_base = '2100';
        $wage->attendance_stander = '800';
        $wage->attendance_deduction = '150';
        $wage->cellphone_grant = '50';
        $wage->meal_grant = '400';
        $wage->person_hour_standard = '180';
        $wage->trip_allowance_standard = '300';
        $wage->piece_rate_stander = '400';
        $wage->piece_rate_award_stander = '100';
        $wage->piece_rate_award_requirement = '6';
        $wage->save();
    }
}
