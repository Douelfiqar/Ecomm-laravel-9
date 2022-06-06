<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Auth;
use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        Fortify::loginView(function (Request $request) {

            $admin = false;
            if(Auth::check()){
                if($request->user()->roles()->first()->name == 'admin'){
                    $admin = true;
                };
            }
            $categories = Category::all();

            return view('auth.login',compact('admin','categories'));
        });
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
