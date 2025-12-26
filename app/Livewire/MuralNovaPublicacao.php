<?php

namespace App\Livewire;

use App\Models\MuralPost;
use App\Models\MuralPostAttachment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class MuralNovaPublicacao extends Component
{
    use WithFileUploads;

    // 1 imediata | 2 agendada | 3 temporária
    public int $tipo = 1;

    public ?string $data_inicio = null;
    public ?string $data_termino = null;

    public ?string $titulo = null;

    // 1 simples | 2 enquete (no schema é string, mas pode ser int também)
    public string $modalidade = '1';

    public ?string $conteudo = null;

    public ?string $link_externo = null;
    public ?string $link_tile = null;

    /** @var array<int, \Livewire\Features\SupportFileUploads\TemporaryUploadedFile> */
    public array $anexos = [];

    protected function rules(): array
    {
        return [
            'tipo' => ['required', 'integer', Rule::in([1,2,3])],

            'data_inicio' => [
                Rule::requiredIf(fn () => in_array($this->tipo, [2,3], true)),
                'nullable',
                'date',
            ],
            'data_termino' => [
                Rule::requiredIf(fn () => $this->tipo === 3),
                'nullable',
                'date',
                'after_or_equal:data_inicio',
            ],

            'titulo' => ['required', 'string', 'max:255'],

            'modalidade' => ['required', Rule::in(['1','2'])],

            'conteudo' => ['nullable', 'string'],

            'link_externo' => ['nullable', 'string', 'max:2048'],
            'link_tile' => ['nullable', 'string', 'max:255'],

            'anexos' => ['nullable', 'array', 'max:10'],
            'anexos.*' => [
                'file',
                'max:10240', // 10MB por arquivo
                // se quiser travar tipos: 'mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx,zip'
            ],
        ];
    }

    protected array $messages = [
        'tipo.required' => 'Selecione o tipo.',
        'tipo.in' => 'Tipo inválido.',

        'data_inicio.required' => 'Informe a data de publicação.',
        'data_inicio.date' => 'Data "Publicar em" inválida.',

        'data_termino.required' => 'Informe a data de arquivamento.',
        'data_termino.date' => 'Data "Manter até" inválida.',
        'data_termino.after_or_equal' => '"Manter até" deve ser igual ou depois de "Publicar em".',

        'titulo.required' => 'Informe o título.',
        'titulo.max' => 'Título muito longo (máx. 255).',

        'modalidade.required' => 'Selecione a modalidade.',
        'modalidade.in' => 'Modalidade inválida.',

        'link_externo.max' => 'Link externo muito longo.',
        'link_tile.max' => 'Nome do link muito longo.',

        'anexos.max' => 'Máximo de 10 arquivos.',
        'anexos.*.max' => 'Arquivo maior que 10MB.',
        'anexos.*.file' => 'Arquivo inválido.',
    ];

    public function updatedTipo(): void
    {
        // imediata: zera datas e limpa validação dos campos de data
        if ($this->tipo === 1) {
            $this->data_inicio = null;
            $this->data_termino = null;
        }

        $this->resetValidation(['data_inicio', 'data_termino']);
    }

    public function save(): void
    {
        $this->validate();

        $funcionarioId = Auth::user()->funcionario_id ?? Auth::id();

        $post = MuralPost::create([
            'funcionario_id' => $funcionarioId,
            'tipo' => $this->tipo,
            'data_inicio' => $this->tipo === 1 ? null : $this->data_inicio,
            'data_termino' => $this->tipo === 3 ? $this->data_termino : null,
            'modalidade' => $this->modalidade,
            'titulo' => $this->titulo,
            'conteudo' => $this->conteudo,
            'link_externo' => $this->link_externo,
            'link_tile' => $this->link_tile,
        ]);

        foreach ($this->anexos as $file) {
            $path = $file->store("mural/posts/{$post->id}", 'public');

            MuralPostAttachment::create([
                'post_id' => $post->id,
                'file_url' => $path,
                'file_extension' => strtolower($file->getClientOriginalExtension() ?: ''),
                'file_size' => (string) $file->getSize(),
                'download_count' => 0,
            ]);
        }

        $this->resetForm();

        $this->dispatch('mural-post-created', id: $post->id);
        $this->dispatch('close-modal', id: 'modal-nova-publicacao');
    }

    public function resetForm(): void
    {
        $this->reset([
            'tipo','data_inicio','data_termino',
            'titulo','modalidade','conteudo',
            'link_externo','link_tile','anexos'
        ]);

        $this->tipo = 1;
        $this->modalidade = '1';

        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.mural-nova-publicacao');
    }
}
