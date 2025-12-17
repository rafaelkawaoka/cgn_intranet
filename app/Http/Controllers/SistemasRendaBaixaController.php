<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SistemasRendaBaixaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('sistemas.renda.baixa.index');
    }
}
