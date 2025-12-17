<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class FuncionariosTodosCount extends Component
{
    public ?int $total = null;

    #[On('funcionariosUpdate')]
    public function load()
    {
        $this->total = User::count();
    }

    public function render()
    {
        return view('livewire.funcionarios-todos-count');
    }
}
