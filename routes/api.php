<?php

use App\Http\Controllers\Tenant\TenantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {
    });
}


Route::post('register',[TenantController::class,'register']);

//Route::post('login',[TenantController::class,'login']);

