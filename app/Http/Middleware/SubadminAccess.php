<?php

namespace App\Http\Middleware;

use App\Models\Subadminaccess as Subadmin_access_model;
use Closure;
use Illuminate\Http\Request;

class SubadminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $section)
    {
        // Auth::u()->id
        $subadmin_accedata = Subadmin_access_model::where('subadmin_id', 3)->firstOrFail();
        $access_array = json_decode($subadmin_access_data->access, true);

        if (in_array($section, $access_array)) {
            return $next($request);
        } else {
            return redirect()->route('admin.dashboard');
        }

    }
}
