<?php

namespace App\Http\LineControllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Linebot extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function request()
    {
    	return '200 OK';
    }
}