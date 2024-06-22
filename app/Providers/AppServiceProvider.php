<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('less_than_price_ht', function ($attribute, $value, $parameters, $validator) {
            $priceHt = $validator->getData()['price_ht'];
            return $value < $priceHt;
        });

        Validator::replacer('less_than_price_ht', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':price_ht', $parameters[0], $message);
        });
        Paginator::useBootstrap();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
