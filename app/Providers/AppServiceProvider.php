<?php

namespace App\Providers;


use App\Models\Loaithucung;
use App\Models\Loaivatdung;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
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
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        view()->composer('*',function($view){
            $view->with(
                [
                    'typePet'=>Loaithucung::with(
                                [
                                    'giongthucung'=> function ($query) {
                                        $query->select();
                                    }
                                ]
                                )->get(['maloaithucung','tenloaithucung','slug']
                    ),

                    'typeItem'=>Loaivatdung::get(['maloaivatdung','tenloaivatdung','slug']
                    ),

                    'carouselPet' => Loaithucung::get(['maloaithucung','tenloaithucung','hinhanh','slug']
                    ),

                    'carouselItem' => Loaivatdung::get(['maloaivatdung','tenloaivatdung','hinhanh','slug']
                    ),

                ]
            );
        });
    }
}
