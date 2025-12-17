<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SistemasAtendimentoCadastrosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('sistemas.atendimento.cadastros.index');
    }

    public function cadastro()
    {
        return view('sistemas.atendimento.cadastros.cadastro');
    }
}
