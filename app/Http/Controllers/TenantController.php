<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Tenants\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TenantController extends Controller
{
    public function create(Request $request)
    {
        $tenant = Tenant::create(['id' => $request->tenant_name]);
        $tenant->createDomain([
            'domain' => $request->domain_name . '.localhost',
        ]);

        $tenant->run(function () use($request) {
            User::create([
                'name' => $request->tenant_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_owner' => true
            ]);
        });
        $tenant =  $tenant->domains()->first();
        return $this->getSuccessResponse($tenant);
    }
}
