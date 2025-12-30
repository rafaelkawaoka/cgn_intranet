<?php

namespace App\Livewire\Atendimento\Cadastros;

use App\Models\Customer;
use App\Models\JapanCity;
use App\Models\JapanProvince;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Cadastros extends Component
{
    use WithPagination;

    // filtros
    public ?string $searchCpf = null;
    public ?string $searchName = null;
    public ?string $searchCelular = null;
    public ?string $searchMatricula = null;
    public ?string $searchNascimento = null;
    public bool $prefilling = false;

    // form
    public ?int $customerId = null;
    public ?string $cpf = null;
    public string $nome = '';
    public ?string $nascimento = null; // YYYY-MM-DD
    public ?string $sexo = null; // F/M
    public ?string $telefone_celular = null;
    public ?string $telefone_fixo = null;
    public ?string $email = null;
    public ?int $provincia_id = null;
    public ?int $cidade_id = null;
    public ?string $createdRange = null;

    // selects
    public array $cities = [];
    public string $matriculaPrefix = 'JPN';

    // flags UI
    public bool $cpfFound = false;

    public function mount(): void
    {
        $this->matriculaPrefix = (string) env('MATRICULA_PREFIX', 'JPN');
        $this->loadCities();
    }

    public function updating($name, $value): void
    {
        if (str_starts_with($name, 'search')) $this->resetPage();
    }

    public function updatedProvinciaId(): void
    {
        if ($this->prefilling) return;

        $this->cidade_id = null;
        $this->loadCities();
    }


    public function filterCreated(string $range): void
    {
        $this->createdRange = $range;
        $this->resetPage();
    }

    public function clearCreatedFilter(): void
    {
        $this->createdRange = null;
        $this->resetPage();
    }

    private function loadCities(): void
    {
        $this->cities = JapanCity::query()
            ->where('provincia_id', $this->provincia_id)
            ->orderByDesc('capital')
            ->orderBy('cidade')
            ->get(['id','cidade','capital'])
            ->map(fn ($c) => [
                'id' => $c->id,
                'cidade' => $c->cidade,
                'capital' => (int) $c->capital, // garante a chave
            ])
            ->all();
    }


    public function openCreate(): void
    {
        $this->resetValidation();
        $this->resetForm();

        $this->dispatch('open-modal', id: 'modal-cadastro');
    }

    public function openEdit(int $id): void
    {
        $customer = Customer::findOrFail($id);
        $this->fillFromCustomer($customer);

        $this->dispatch('open-modal', id: 'modal-cadastro');
        $this->dispatch('reapply-masks'); // 👈 aqui
    }

    private function fillFromCustomer(Customer $c): void
    {
        $this->prefilling = true;

        $this->customerId = $c->id;
        $this->cpf = $c->cpf;
        $this->nome = $c->nome;
        $this->nascimento = optional($c->nascimento)->format('Y-m-d');
        $this->sexo = $c->sexo;
        $this->telefone_celular = $c->telefone_celular;
        $this->telefone_fixo = $c->telefone_fixo;
        $this->email = $c->email;

        $this->provincia_id = (int) $c->provincia_id;
        $this->loadCities();

        // 👇 NÃO seta aqui
        $this->dispatch('set-city-after-load', cidadeId: (int) $c->cidade_id);

        $this->cpfFound = true;
        $this->prefilling = false;
    }



    /**
     * Ao terminar CPF (blur): se existir, puxa e vira modo atualização.
     */
    public function cpfLookup(): void
    {
        $cpf = $this->digitsOnly($this->cpf);

        // enquanto não tiver 11 dígitos, NÃO faz nada (não reseta)
        if (!$cpf || strlen($cpf) !== 11) {
            $this->cpfFound = false;
            // importante: não mexer em $this->cpf aqui
            // e não dar reset em customerId / campos
            return;
        }

        // se já está carregado com esse CPF, não reconsulta
        if ($this->cpfFound && $this->customerId) {
            $current = Customer::find($this->customerId);
            if ($current && $current->cpf === $cpf) return;
        }

        $found = Customer::where('cpf', $cpf)->first();

        if (!$found) {
            $this->cpfFound = false;
            $this->customerId = null; // ok limpar aqui (CPF completo e não existe)
            return;
        }

        $this->fillFromCustomer($found);
        $this->dispatch('notify', type: 'warning', message: 'CPF já cadastrado.');
        $this->dispatch('reapply-masks'); // pra manter máscara após preencher
    }



    public function save(): void
    {
        $data = $this->validate($this->rules());

        // normaliza
        $data['cpf'] = $this->digitsOnly($data['cpf'] ?? null);
        $data['telefone_celular'] = $this->digitsOnly($data['telefone_celular'] ?? null);
        $data['telefone_fixo'] = $this->digitsOnly($data['telefone_fixo'] ?? null);
        $data['email'] = $data['email'] ? mb_strtolower(trim($data['email'])) : null;

        // cidade pertence à província
        if (!empty($data['cidade_id']) && !empty($data['provincia_id'])) {
            $ok = JapanCity::where('id', $data['cidade_id'])
                ->where('provincia_id', $data['provincia_id'])
                ->exists();
            if (!$ok) {
                $this->addError('cidade_id', 'Cidade inválida para a província selecionada.');
                return;
            }
        }

        if ($this->customerId) {
            Customer::findOrFail($this->customerId)->update($data);
            $this->dispatch('notify', type: 'success', message: 'Cadastro atualizado.');
        } else {
            $data['matricula'] = $this->generateMatricula();
            $created = Customer::create($data);
            $this->customerId = $created->id;
            $this->cpfFound = true;
            $this->dispatch('notify', type: 'success', message: 'Cadastro criado.');
        }

        $this->dispatch('close-modal', id: 'modal-cadastro');
        $this->resetForm();
    }

    /**
     * Atualiza e abre (quando CPF já existia).
     * Ajuste a rota para a sua tela real.
     */
    public function saveAndOpen()
    {
        $this->save();

        if ($this->customerId) {
            // TROQUE essa rota para a sua
            return $this->redirectRoute('sistemas.atendimento.cadastros.show', ['id' => $this->customerId], navigate: true);
        }
    }

    private function rules(): array
    {
        return [
            'cpf' => [
                'nullable',
                'string',
                Rule::unique('customers', 'cpf')->ignore($this->customerId),
            ],
            'nome' => ['required','string','min:3','max:255'],
            'nascimento' => ['nullable','date','before_or_equal:today'],
            'sexo' => ['required', Rule::in(['F','M'])],
            'telefone_celular' => ['nullable','string','max:50'],
            'telefone_fixo' => ['nullable','string','max:50'],
            'email' => ['nullable','email','max:255'],
            'provincia_id' => ['nullable','integer','exists:japan_provinces,id'],
            'cidade_id' => ['nullable','integer','exists:japan_cities,id'],
        ];
    }

    private function resetForm(): void
    {
        $this->customerId = null;
        $this->cpf = null;
        $this->nome = '';
        $this->nascimento = null;
        $this->sexo = null;
        $this->telefone_celular = null;
        $this->telefone_fixo = null;
        $this->email = null;
        $this->provincia_id = null;
        $this->cidade_id = null;

        $this->cpfFound = false;

        $this->loadCities();
    }

    private function digitsOnly(?string $v): ?string
    {
        if (!$v) return null;
        $v = preg_replace('/\D+/', '', $v);
        return $v ?: null;
    }

    private function generateMatricula(): string
    {
        do {
            $mat = $this->matriculaPrefix . Carbon::now()->format('Y') . random_int(100000, 999999);
        } while (Customer::where('matricula', $mat)->exists());

        return $mat;
    }

    private function stats(): array
    {
        $now = Carbon::now();
        $weekStart = $now->copy()->startOfWeek(Carbon::MONDAY);
        $weekEnd   = $now->copy()->endOfWeek(Carbon::SUNDAY);

        return [
            'week'  => Customer::whereBetween('created_at', [$weekStart, $weekEnd])->count(),
            'month' => Customer::whereYear('created_at', $now->year)->whereMonth('created_at', $now->month)->count(),
            'year'  => Customer::whereYear('created_at', $now->year)->count(),
            'total' => Customer::count(),
        ];
    }

    public function provinciaChanged(): void
    {
        if ($this->prefilling) return;

        $this->cidade_id = null;
        $this->loadCities();
    }


    public function render()
    {
        $stats = $this->stats();

        $q = Customer::query()
            ->with(['provincia:id,provincia', 'cidade:id,cidade', 'updatedBy:id,name'])
            ->when($this->searchCpf, fn($qq) => $qq->where('cpf', 'like', '%'.$this->digitsOnly($this->searchCpf).'%'))
            ->when($this->searchName, fn($qq) => $qq->where('nome', 'like', '%'.trim($this->searchName).'%'))
            ->when($this->searchCelular, fn($qq) => $qq->where('telefone_celular', 'like', '%'.$this->digitsOnly($this->searchCelular).'%'))
            ->when($this->searchMatricula, fn($qq) => $qq->where('matricula', 'like', '%'.trim($this->searchMatricula).'%'))
            ->when($this->searchNascimento, fn($qq) => $qq->whereDate('nascimento', $this->searchNascimento));

        // filtro rápido pelos cards (created_at)
        $q->when($this->createdRange, function ($qq) {
            $now = Carbon::now();

            if ($this->createdRange === 'week') {
                $start = $now->copy()->startOfWeek(Carbon::MONDAY);
                $end   = $now->copy()->endOfWeek(Carbon::SUNDAY);
                $qq->whereBetween('created_at', [$start, $end]);
            } elseif ($this->createdRange === 'month') {
                $qq->whereYear('created_at', $now->year)->whereMonth('created_at', $now->month);
            } elseif ($this->createdRange === 'year') {
                $qq->whereYear('created_at', $now->year);
            }
        });

        $customers = $q->orderByDesc('updated_at')->paginate(25);

        $provincias = JapanProvince::query()
            ->orderBy('provincia')
            ->get(['id','provincia']);

        return view('livewire.atendimento.cadastros.cadastros', [
            'customers' => $customers,
            'stats' => $stats,
            'provincias' => $provincias,
        ]);
    }

}
