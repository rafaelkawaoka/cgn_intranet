<?php

namespace App\Http\Controllers;

use App\Models\Customer;
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

    public function cadastro(Request $request)
    {
        $cadastros = Customer::where('matricula', $request->matricula)->firstOrFail();
        return view('sistemas.atendimento.cadastros.cadastro');
    }
}
