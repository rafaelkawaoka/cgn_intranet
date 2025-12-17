<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class FuncionariosTable extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public string $section = 'ativos';
    public string $search = '';

    protected $queryString = [
        'section' => ['except' => 'ativos'],
        'search'  => ['except' => ''],
    ];

    public function mount()
    {
        if (! in_array($this->section, ['ativos','inativos','ausentes','todos'], true)) {
            $this->section = 'ativos';
        }
    }

    #[On('funcionariosFilterChanged')]
    public function applyFilters(string $search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function render()
    {
        $query = User::query();

        if ($this->section !== 'todos') {
            match ($this->section) {
                'ativos'   => $query->where('is_active', true),
                'inativos' => $query->where('is_active', false),
                'ausentes' => $query->where('name', 'aaaa'),
                default    => null,
            };
        }

        $query->when($this->search !== '', function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%');
        });

        return view('livewire.funcionarios-table', [
            'funcionarios' => $query
                ->orderBy('name')
                ->paginate(25)
                ->withQueryString()
                ->withPath(request()->url()),
        ]);
    }
}
