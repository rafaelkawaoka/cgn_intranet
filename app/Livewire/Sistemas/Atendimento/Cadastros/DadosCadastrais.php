<?php

namespace App\Livewire\Sistemas\Atendimento\Cadastros;

use App\Models\BrazilCity;
use App\Models\BrazilState;
use App\Models\Country;
use App\Models\Customer;
use App\Models\JapanCity;
use App\Models\JapanProvince;
use App\Models\Occupation;
use Livewire\Component;

class DadosCadastrais extends Component
{
    public Customer $cadastro;

    // Form fields
    public $nome;
    public $matricula;
    public $sexo;
    public $estado_civil;
    public $escolaridade;
    public $occupation_id;
    public $nascimento;
    public $pais_nascimento_id;
    public $estado_nascimento_br_id;
    public $estado_nascimento_jp_id;
    public $estado_nascimento_outro;
    public $cidade_nascimento_br_id;
    public $cidade_nascimento_jp_id;
    public $cidade_nascimento_outro;
    public $idioma;
    public $nacionalidades = [];

    // Collections for dropdowns
    public $countries;
    public $occupations;
    public $brazilStates;
    public $brazilCities = [];
    public $japanProvinces;
    public $japanCities = [];

    public function mount(Customer $cadastro)
    {
        $this->cadastro = $cadastro;
        $this->fill($cadastro->only([
            'nome',
            'matricula',
            'sexo',
            'estado_civil',
            'escolaridade',
            'occupation_id',
            'nascimento',
            'pais_nascimento_id',
            'estado_nascimento_br_id',
            'estado_nascimento_jp_id',
            'estado_nascimento_outro',
            'cidade_nascimento_br_id',
            'cidade_nascimento_jp_id',
            'cidade_nascimento_outro',
            'idioma',
        ]));

        if ($this->nascimento) {
            $this->nascimento = $this->nascimento->format('Y-m-d');
        }

        $this->nacionalidades = $cadastro->nationalities()->pluck('country_id')->toArray();

        // Load static collections
        $this->countries = Country::orderBy('pais')->get();
        $this->occupations = Occupation::orderBy('profissao')->get();
        $this->brazilStates = BrazilState::orderBy('estado')->get();
        $this->japanProvinces = JapanProvince::orderBy('provincia')->get();

        // Load dynamic collections based on current selection
        $this->loadCities();
    }

    public function updatedPaisNascimentoId()
    {
        $this->estado_nascimento_br_id = null;
        $this->estado_nascimento_jp_id = null;
        $this->estado_nascimento_outro = null;
        $this->cidade_nascimento_br_id = null;
        $this->cidade_nascimento_jp_id = null;
        $this->cidade_nascimento_outro = null;
        $this->brazilCities = [];
        $this->japanCities = [];
    }

    public function updatedEstadoNascimentoBrId()
    {
        $this->cidade_nascimento_br_id = null;
        $this->loadCities();
    }

    public function updatedEstadoNascimentoJpId()
    {
        $this->cidade_nascimento_jp_id = null;
        $this->loadCities();
    }

    public function loadCities()
    {
        if ($this->estado_nascimento_br_id) {
            $this->brazilCities = BrazilCity::where('estado_id', $this->estado_nascimento_br_id)->orderBy('cidade')->get();
        }

        if ($this->estado_nascimento_jp_id) {
            $this->japanCities = JapanCity::where('provincia_id', $this->estado_nascimento_jp_id)->orderBy('cidade')->get();
        }
    }

    public function save()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'sexo' => 'nullable|string',
            'estado_civil' => 'nullable|string',
            'escolaridade' => 'nullable|string',
            'occupation_id' => 'nullable|exists:occupations,id',
            'nascimento' => 'nullable|date',
            'pais_nascimento_id' => 'nullable|exists:countries,id',
            'idioma' => 'nullable|string',
        ]);

        $data = [
            'nome' => $this->nome,
            'sexo' => $this->sexo,
            'estado_civil' => $this->estado_civil,
            'escolaridade' => $this->escolaridade,
            'occupation_id' => $this->occupation_id,
            'nascimento' => $this->nascimento,
            'pais_nascimento_id' => $this->pais_nascimento_id,
            'idioma' => $this->idioma,
        ];

        // Handle specific logic for Place of Birth
        $country = Country::find($this->pais_nascimento_id);

        if ($country) {
            if ($country->codPais == 'BRA') {
                $data['estado_nascimento_br_id'] = $this->estado_nascimento_br_id;
                $data['cidade_nascimento_br_id'] = $this->cidade_nascimento_br_id;

                // Explicitly nullify others
                $this->estado_nascimento_jp_id = null;
                $this->cidade_nascimento_jp_id = null;
                $this->estado_nascimento_outro = null;
                $this->cidade_nascimento_outro = null;

                $data['estado_nascimento_jp_id'] = null;
                $data['cidade_nascimento_jp_id'] = null;
                $data['estado_nascimento_outro'] = null;
                $data['cidade_nascimento_outro'] = null;
            } elseif ($country->codPais == 'JPN') {
                 $data['estado_nascimento_jp_id'] = $this->estado_nascimento_jp_id;
                 $data['cidade_nascimento_jp_id'] = $this->cidade_nascimento_jp_id;

                 // Explicitly nullify others
                 $this->estado_nascimento_br_id = null;
                 $this->cidade_nascimento_br_id = null;
                 $this->estado_nascimento_outro = null;
                 $this->cidade_nascimento_outro = null;

                 $data['estado_nascimento_br_id'] = null;
                 $data['cidade_nascimento_br_id'] = null;
                 $data['estado_nascimento_outro'] = null;
                 $data['cidade_nascimento_outro'] = null;
            } else {
                 $data['estado_nascimento_outro'] = $this->estado_nascimento_outro;
                 $data['cidade_nascimento_outro'] = $this->cidade_nascimento_outro;

                 // Explicitly nullify others
                 $this->estado_nascimento_br_id = null;
                 $this->cidade_nascimento_br_id = null;
                 $this->estado_nascimento_jp_id = null;
                 $this->cidade_nascimento_jp_id = null;

                 $data['estado_nascimento_br_id'] = null;
                 $data['cidade_nascimento_br_id'] = null;
                 $data['estado_nascimento_jp_id'] = null;
                 $data['cidade_nascimento_jp_id'] = null;
            }
        } else {
             $data['estado_nascimento_br_id'] = null;
             $data['cidade_nascimento_br_id'] = null;
             $data['estado_nascimento_jp_id'] = null;
             $data['cidade_nascimento_jp_id'] = null;
             $data['estado_nascimento_outro'] = null;
             $data['cidade_nascimento_outro'] = null;

             $this->estado_nascimento_br_id = null;
             $this->cidade_nascimento_br_id = null;
             $this->estado_nascimento_jp_id = null;
             $this->cidade_nascimento_jp_id = null;
             $this->estado_nascimento_outro = null;
             $this->cidade_nascimento_outro = null;
        }

        $this->cadastro->update($data);
        $this->cadastro->nationalities()->sync($this->nacionalidades);

        session()->flash('message', 'Cadastro atualizado com sucesso.');
    }

    public function render()
    {
        return view('livewire.sistemas.atendimento.cadastros.dados-cadastrais');
    }
}
