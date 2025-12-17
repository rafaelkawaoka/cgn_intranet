<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class FuncionariosAtivosCount extends Component
{
    public ?int $total = null;

    #[On('funcionariosUpdate')]
    public function load()
    {
        $this->total = User::where('is_active', 1)->count();
    }

    public function render()
    {
        return view('livewire.funcionarios-ativos-count');
    }
}
