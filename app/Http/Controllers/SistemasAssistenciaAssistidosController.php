<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SistemasAssistenciaAssistidosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('sistemas.assistencia.assistidos.index');
    }
}
