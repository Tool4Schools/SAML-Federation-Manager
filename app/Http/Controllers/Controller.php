<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function currentOrganisation(Request $request)
    {
       /* if($request->session()->has('organisation_id'))
        {
            return Auth::user()->organisations()->find($request->session()->get('organisation_id'));
        }
        */

        return Auth::user()->organisations[0];
    }
}
