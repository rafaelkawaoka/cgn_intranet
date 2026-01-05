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

    // Documentos
    public $cpf;
    public $identidade_tipo;
    public $identidade_numero;
    public $identidade_orgao;
    public $identidade_emissao;
    public $titulo_eleitor;
    public $titulo_secao;
    public $titulo_zona;
    public $titulo_local;
    public $zayriu_card;
    public $habilitacao_japonesa;
    public $passaporte_estrangeiro;
    public $passaporte_estrangeiro_validade;

    // Contatos
    public $phones = [];
    public $emails = [];
    public $emergencyContacts = [];

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
            'cpf',
            'identidade_tipo',
            'identidade_numero',
            'identidade_orgao',
            'identidade_emissao',
            'titulo_eleitor',
            'titulo_secao',
            'titulo_zona',
            'titulo_local',
            'zayriu_card',
            'habilitacao_japonesa',
            'passaporte_estrangeiro',
            'passaporte_estrangeiro_validade',
        ]));

        if ($this->nascimento) {
            $this->nascimento = $this->nascimento->format('Y-m-d');
        }
        if ($this->identidade_emissao) {
            $this->identidade_emissao = \Carbon\Carbon::parse($this->identidade_emissao)->format('Y-m-d');
        }
        if ($this->passaporte_estrangeiro_validade) {
            $this->passaporte_estrangeiro_validade = \Carbon\Carbon::parse($this->passaporte_estrangeiro_validade)->format('Y-m-d');
        }

        $this->nacionalidades = $cadastro->nationalities()->pluck('country_id')->toArray();

        // Load Contatos
        $this->phones = $cadastro->phones()->get()->toArray();
        $this->emails = $cadastro->emails()->get()->toArray();
        $this->emergencyContacts = $cadastro->emergencyContacts()->get()->toArray();

        // Load static collections
        $this->countries = Country::orderBy('pais')->get();
        $this->occupations = Occupation::orderBy('profissao')->get();
        $this->brazilStates = BrazilState::orderBy('nome')->get();
        $this->japanProvinces = JapanProvince::orderBy('name')->get();

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
            $this->brazilCities = BrazilCity::where('brazil_state_id', $this->estado_nascimento_br_id)->orderBy('nome')->get();
        }

        if ($this->estado_nascimento_jp_id) {
            $this->japanCities = JapanCity::where('japan_province_id', $this->estado_nascimento_jp_id)->orderBy('name')->get();
        }
    }

    public function addPhone()
    {
        $this->phones[] = ['numero' => '', 'tipo' => 'Celular', 'observacoes' => ''];
    }

    public function removePhone($index)
    {
        unset($this->phones[$index]);
        $this->phones = array_values($this->phones);
    }

    public function addEmail()
    {
        $this->emails[] = ['email' => '', 'tipo' => 'Pessoal'];
    }

    public function removeEmail($index)
    {
        unset($this->emails[$index]);
        $this->emails = array_values($this->emails);
    }

    public function addEmergencyContact()
    {
        $this->emergencyContacts[] = ['nome' => '', 'telefone' => '', 'parentesco' => ''];
    }

    public function removeEmergencyContact($index)
    {
        unset($this->emergencyContacts[$index]);
        $this->emergencyContacts = array_values($this->emergencyContacts);
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
            'phones.*.numero' => 'required|string',
            'emails.*.email' => 'required|email',
            'emergencyContacts.*.nome' => 'required|string',
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
            'cpf' => $this->cpf,
            'identidade_tipo' => $this->identidade_tipo,
            'identidade_numero' => $this->identidade_numero,
            'identidade_orgao' => $this->identidade_orgao,
            'identidade_emissao' => $this->identidade_emissao,
            'titulo_eleitor' => $this->titulo_eleitor,
            'titulo_secao' => $this->titulo_secao,
            'titulo_zona' => $this->titulo_zona,
            'titulo_local' => $this->titulo_local,
            'zayriu_card' => $this->zayriu_card,
            'habilitacao_japonesa' => $this->habilitacao_japonesa,
            'passaporte_estrangeiro' => $this->passaporte_estrangeiro,
            'passaporte_estrangeiro_validade' => $this->passaporte_estrangeiro_validade,
        ];

        // Handle specific logic for Place of Birth
        $country = Country::find($this->pais_nascimento_id);

        if ($country) {
            if ($country->codPais == 'BRA') {
                $data['estado_nascimento_br_id'] = $this->estado_nascimento_br_id;
                $data['cidade_nascimento_br_id'] = $this->cidade_nascimento_br_id;
                $data['estado_nascimento_jp_id'] = null;
                $data['cidade_nascimento_jp_id'] = null;
                $data['estado_nascimento_outro'] = null;
                $data['cidade_nascimento_outro'] = null;
            } elseif ($country->codPais == 'JPN') {
                 $data['estado_nascimento_jp_id'] = $this->estado_nascimento_jp_id;
                 $data['cidade_nascimento_jp_id'] = $this->cidade_nascimento_jp_id;
                 $data['estado_nascimento_br_id'] = null;
                 $data['cidade_nascimento_br_id'] = null;
                 $data['estado_nascimento_outro'] = null;
                 $data['cidade_nascimento_outro'] = null;
            } else {
                 $data['estado_nascimento_outro'] = $this->estado_nascimento_outro;
                 $data['cidade_nascimento_outro'] = $this->cidade_nascimento_outro;
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
        }

        // Sync most recent phone/email to main table columns if available
        if (!empty($this->phones)) {
            // Get the last added/edited phone as 'most recent'
            $lastPhone = end($this->phones);
            if ($lastPhone['tipo'] == 'Celular') {
                $data['telefone_celular'] = $lastPhone['numero'];
            } else {
                $data['telefone_fixo'] = $lastPhone['numero'];
            }
        }

        if (!empty($this->emails)) {
            $lastEmail = end($this->emails);
            $data['email'] = $lastEmail['email'];
        }

        $this->cadastro->update($data);
        $this->cadastro->nationalities()->sync($this->nacionalidades);

        // Sync Contatos
        // Delete existing and re-create? Or update?
        // Simple strategy: delete all and recreate for now to handle IDs easily, or update if ID exists.
        // Better: Sync properly.

        $this->syncHasMany($this->cadastro->phones(), $this->phones);
        $this->syncHasMany($this->cadastro->emails(), $this->emails);
        $this->syncHasMany($this->cadastro->emergencyContacts(), $this->emergencyContacts);

        session()->flash('message', 'Cadastro atualizado com sucesso.');
    }

    protected function syncHasMany($relationship, $items)
    {
        // Get existing IDs
        $existingIds = $relationship->pluck('id')->toArray();
        $submittedIds = array_column($items, 'id'); // If ID exists in array

        // Delete removed
        $toDelete = array_diff($existingIds, $submittedIds);
        if (!empty($toDelete)) {
            $relationship->whereIn('id', $toDelete)->delete();
        }

        // Update or Create
        foreach ($items as $item) {
            if (isset($item['id']) && in_array($item['id'], $existingIds)) {
                $relationship->where('id', $item['id'])->update($item);
            } else {
                $relationship->create($item);
            }
        }
    }

    public function render()
    {
        return view('livewire.sistemas.atendimento.cadastros.dados-cadastrais');
    }
}
