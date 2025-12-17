<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SistemasAdministracaoFuncionariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $allowed = ['ativos', 'inativos', 'ausentes', 'todos'];
        $section = $request->query('section');
        if (! in_array($section, $allowed, true)) {
            return redirect()->route('sistemas.administracao.funcionarios', ['section' => 'ativos']);
        }
        return view('sistemas.administracao.funcionarios.index', compact('section'));
    }

    public function funcionario(Request $request){
        $funcionario = User::findOrFail($request->id);
        return view('sistemas.administracao.funcionarios.funcionario', compact('funcionario'));
    }
}
