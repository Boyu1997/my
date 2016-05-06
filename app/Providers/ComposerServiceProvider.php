<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('*', function($view) {
            if (\Auth::check())
            {
                $user = \Auth::user();
                $employee = \App\Employee::where('id', '=', $user->id)->first();
                if(sizeof($employee) != 0)
                {
                    $privilege = \App\Privilege::where('employee_id', '=', $employee->id)->first();
                    $wage = \App\Wage::where('employee_id', '=', $employee->id)->first();
                }
                else {
                    $privilege = [];
                    $wage = [];
                }
                $view->with(compact('user', 'privilege', 'wage'));
            }
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
