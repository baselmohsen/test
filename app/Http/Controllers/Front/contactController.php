<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\settings;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\settle;

class contactController extends Controller
{
    public function index(){

        $data=settings::first();

        return view('Front.courses.contact')->with('data',$data);
    }
}
