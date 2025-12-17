<?php

namespace App\Livewire;

use Livewire\Component;

class FuncionariosFilter extends Component
{
    public string $search = '';

    public function updatedSearch()
    {
        $this->dispatch('funcionariosFilterChanged', $this->search);
    }

    public function render()
    {
        return view('livewire.funcionarios-filter');
    }
}
