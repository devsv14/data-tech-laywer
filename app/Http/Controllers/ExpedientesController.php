<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpedientesController extends Controller
{
    public function index()
    {

        return view('expedientes.index');
    }
}
