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
        //$trace=debug_backtrace();
        //echo "<pre>";
        //print_r($trace);
        //echo "</pre>";
        /*
        \View::composer('*', function($view) {
            if (\Auth::check())
            {
                $user = \Auth::user();
                if ($user->employee_id) {
                    $employee = \App\Employee::where('id', '=', $user->employee_id)->first();
                    if ($employee->privilege_id)
                    {
                        $privilege = \App\Privilege::where('id', '=', $employee->privilege_id)->first();
                    }
                    else $privilege = [];
                    if ($employee->wage_id)
                    {
                        $wage = \App\Wage::where('id', '=', $employee->wage_id)->first();
                        //$wage = \App\Wage::where('id', '=', 10)->first();
                    }
                    else $wage = [];
                }
                else {
                    $privilege = [];
                    $wage = [];
                }
                $view->with(compact('user', 'employee', 'privilege', 'wage'));
            }
        });
        */
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
