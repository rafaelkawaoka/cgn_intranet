<?php

namespace App\Livewire;

use App\Models\user;
use Livewire\Component;

class FuncionariosInativosCount extends Component
{
    public ?int $total = null;

    #[On('funcionariosUpdate')]
    public function load()
    {
        $this->total = User::where('is_active', 0)->count();
    }

    public function render()
    {
        return view('livewire.funcionarios-inativos-count');
    }
}
