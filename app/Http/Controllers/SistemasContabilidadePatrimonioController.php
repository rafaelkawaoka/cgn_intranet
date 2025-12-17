<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SistemasContabilidadePatrimonioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('sistemas.contabilidade.patrimonio.index');
    }
}
