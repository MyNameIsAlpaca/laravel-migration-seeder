<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\train;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    function home()
    {

        $trains = train::select('*')->get();

        return view('home', compact('trains'));
    }
}
