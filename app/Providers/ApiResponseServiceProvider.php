<?php

namespace App\Providers;

use App\Http\Responses\ApiResponse;
use Illuminate\Support\ServiceProvider;

class ApiResponseServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(ApiResponse::class, function () {
            return new ApiResponse();
        });
    }
}