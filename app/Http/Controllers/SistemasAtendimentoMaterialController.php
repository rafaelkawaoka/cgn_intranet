<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SistemasAtendimentoMaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('sistemas.atendimento.material.index');
    }
}
