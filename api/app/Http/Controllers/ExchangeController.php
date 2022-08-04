<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Student;
use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    public function getALl()
    {
        return response()->json(Currency::all());
    }
}
