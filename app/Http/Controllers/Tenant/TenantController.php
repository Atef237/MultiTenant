<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\TenantStore;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function register(TenantStore $request)
    {
       $tenant = Tenant::create(['id' => $request->domain]);
       $tenant->domains()->create(['domain' => $request->domain.'.localhost']);

        return 'done';
    }


    public function login(Request $request)
    {
        if(auth('tenant')->attempt(['username' => $request->email, 'password' => $request->password])){

            return redirect(auth('tenant')->domains()->first()->domain);
        }
    }
}
