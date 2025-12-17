<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class FuncionariosAusentesCount extends Component
{
    public ?int $total = null;

    #[On('funcionariosUpdate')]
    public function load()
    {
        $this->total = 0;
    }

    public function render()
    {
        return view('livewire.funcionarios-ausentes-count');
    }
}
