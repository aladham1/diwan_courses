<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Slides\Saml2\Models\Tenant;

class Authenticate extends Middleware
{
   
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            $tenant = Tenant::where('key', 'ssoidp')->first();
            $redirectTo = saml_url($request->fullUrl(), $tenant->uuid);
            return  redirect($redirectTo);
        }
    }
}
