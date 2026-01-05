<div>
    <div class="row">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1">
                    <a href="{{ route('sistemas.atendimento.cadastros') }}" class="text-body">
                        <i class="icon-base ti tabler-id icon-22px mb-1"></i>
                    </a>
                    Cadastros
                </h4>
                <p class="mb-0">Gerenciamento de matrícula consular</p>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-4">
                <button type="button" class="btn btn-primary" wire:click="openCreate">
                    Novo cadastro
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-success h-100"
                role="button" wire:click="filterCreated('week')">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-success">
                                <i class="icon-base ti tabler-calendar-month icon-28px"></i>
                            </span>
                        </div>
                        <h4 class="mb-0">
                            <span wire:loading wire:target="render">
                                <span class="spinner-border spinner-border-sm text-secondary"></span>
                            </span>
                            <span wire:loading.remove wire:target="render">
                                {{ $stats['week'] }}
                            </span>
                        </h4>
                    </div>
                    <p class="mb-1">Esta semana</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-danger h-100"
                role="button" wire:click="filterCreated('month')">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-danger">
                                <i class="icon-base ti tabler-calendar-week icon-28px"></i>
                            </span>
                        </div>
                        <h4 class="mb-0">
                            <span wire:loading wire:target="render">
                                <span class="spinner-border spinner-border-sm text-secondary"></span>
                            </span>
                            <span wire:loading.remove wire:target="render">
                                {{ $stats['month'] }}
                            </span>
                        </h4>
                    </div>
                    <p class="mb-1">Este mês</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-secondary h-100"
                role="button" wire:click="filterCreated('year')">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-secondary">
                                <i class="icon-base ti tabler-calendar-stats icon-28px"></i>
                            </span>
                        </div>
                        <h4 class="mb-0">
                            <span wire:loading wire:target="render">
                                <span class="spinner-border spinner-border-sm text-secondary"></span>
                            </span>
                            <span wire:loading.remove wire:target="render">
                                {{ $stats['year'] }}
                            </span>
                        </h4>
                    </div>
                    <p class="mb-1">Ano</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-border-shadow-primary h-100"
                role="button" wire:click="clearCreatedFilter">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="icon-base ti tabler-users icon-28px"></i>
                            </span>
                        </div>
                        <h4 class="mb-0">
                            <span wire:loading wire:target="render">
                                <span class="spinner-border spinner-border-sm text-secondary"></span>
                            </span>
                            <span wire:loading.remove wire:target="render">
                                {{ $stats['total'] }}
                            </span>
                        </h4>
                    </div>
                    <p class="mb-1">Total</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-6">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Pesquisa de cadastros ({{ $customers->total() }})</h5>
                    <div class="row pt-4">
                        <div class="col">
                            <label class="form-label">CPF</label>
                            <input type="text" class="form-control mask-cpf" wire:model.live.debounce.500ms="searchCpf">
                        </div>
                        <div class="col-5">
                            <label class="form-label">Nome</label>
                            <input type="text" class="form-control" wire:model.live.debounce.500ms="searchName">
                        </div>
                        <div class="col">
                            <label class="form-label">Celular</label>
                            <input type="text" class="form-control mask-celular" wire:model.live.debounce.500ms="searchCelular">
                        </div>
                        <div class="col">
                            <label class="form-label">Matrícula</label>
                            <input type="text" class="form-control" wire:model.live.debounce.500ms="searchMatricula">
                        </div>
                        <div class="col">
                            <label class="form-label">Nascimento</label>
                            <input type="date" class="form-control" wire:model.live.debounce.500ms="searchNascimento">
                        </div>
                    </div>
                </div>
                <div class="card-body mt-4 table-responsive">
                    <table class="table border table-striped">
                        <thead class="bg-label-secondary">
                            <tr>
                                <th class="col-4">Cadastro</th>
                                <th>Filiação</th>
                                <th class="text-center">Matrícula</th>
                                <th>Localidade</th>
                                <th class="text-center">Atualização</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($customers as $c)
                            <tr>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                        <div class="me-4 border rounded">
                                            <a href="{{ route('sistemas.atendimento.cadastros.cadastro', (['matricula' => $c->matricula])) }}">
                                                <img src="{{ asset('assets/img/placeholders/user_placeholder.jpg') }}" class="rounded" width="46" alt="">
                                            </a>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a class="text-heading text-nowrap fw-medium text-body" href="{{ route('sistemas.atendimento.cadastros.cadastro', (['matricula' => $c->matricula])) }}">
                                                {{ $c->nome }}
                                            </a>
                                            <small class="text-body d-block">
                                                {{ $c->nascimento?->format('d/m/Y') ?? 'Sem informações' }}
                                                {{ $c->nascimento ? "(".calcularIdade($c->nascimento).")" : null }}
                                                <span class="badge bg-label-secondary ms-1 px-2">{{ $c->sexo ?? '--' }}</span>
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <small class="text-body d-block">Fulano de Tal da Silva</small>
                                    <small class="text-body d-block">Beltrana de Tal da Silva</small>
                                </td>
                                <td class="text-center">
                                    <small class="text-body d-block">{{ $c->matricula }}</small>
                                    <small class="text-body d-block">
                                        CPF: {{ $c->cpf ? substr($c->cpf,0,3).'.***.***-'.substr($c->cpf,-2) : '--' }}
                                    </small>
                                </td>
                                <td class="text-center">
                                    <small class="text-body d-block">{{ $c->provincia->provincia ?? '--' }}</small>
                                    <small class="text-body d-block">{{ $c->cidade->cidade ?? '--' }}</small>
                                </td>
                                <td class="text-center">
                                    <small class="text-body d-block">{{ $c->updated_at->format('d/m/Y') }}</small>
                                    <small class="text-body d-block">{{ $c->updatedBy->name ?? '-' }}</small>
                                </td>
                                <td class="text-center">
                                    <div class="d-inline-block text-nowrap">
                                        <button type="button" class="btn btn-text-secondary rounded-pill btn-icon"
                                                title="Atualização Rápida" wire:click="openEdit({{ $c->id }})">
                                            <i class="icon-base ti tabler-bolt icon-22px"></i>
                                        </button>
                                        <button class="btn btn-text-secondary rounded-pill btn-icon"
                                                title="Adicionar Protocolo"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modal-protocolo">
                                            <i class="icon-base ti tabler-phone-plus icon-22px"></i>
                                        </button>
                                        <button class="btn btn-text-secondary rounded-pill btn-icon" title="Adicionar Serviço">
                                            <i class="icon-base ti tabler-file-text-spark icon-22px"></i>
                                        </button>
                                        <button class="btn btn-text-secondary rounded-pill btn-icon" title="Unificar Cadastro">
                                            <i class="icon-base ti tabler-users-group icon-22px"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-body-secondary py-6">
                                    Nenhum cadastro encontrado.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $customers->links("livewire::bootstrap") }}
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="modal-cadastro" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $cpfFound ? 'Atualização Rápida' : 'Novo Cadastro' }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-4">
                            <label class="form-label">CPF:</label>
                            <input type="text" class="form-control mask-cpf @error('cpf') is-invalid @enderror" wire:model.defer="cpf" wire:keyup.debounce.350ms="cpfLookup">
                            @error('cpf')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="form-label">
                                Nome completo <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('nome') is-invalid @enderror" wire:model.defer="nome">
                            @error('nome')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-4 mb-4">
                        <div class="col">
                            <label class="form-label">Nascimento</label>
                            <input type="date" class="form-control @error('nascimento') is-invalid @enderror" wire:model.defer="nascimento">
                            @error('nascimento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="form-label">
                                Sexo <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('sexo') is-invalid @enderror" wire:model.defer="sexo">
                                <option value="">Selecione...</option>
                                <option value="F">Feminino</option>
                                <option value="M">Masculino</option>
                            </select>
                            @error('sexo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label class="form-label">Celular</label>
                            <input type="text" class="form-control mask-celular @error('telefone_celular') is-invalid @enderror" wire:model.defer="telefone_celular">
                            @error('telefone_celular')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-4 mb-4">
                        <div class="col-4">
                            <label class="form-label">Telefone fixo</label>
                            <input type="text" class="form-control mask-telefone @error('telefone_fixo') is-invalid @enderror" wire:model.defer="telefone_fixo">
                            @error('telefone_fixo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model.defer="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-6">
                            <label class="form-label">Província</label>
                            <select class="form-select @error('provincia_id') is-invalid @enderror" wire:model="provincia_id" wire:change="provinciaChanged">
                                <option value="">Selecione...</option>
                                @foreach($provincias as $p)
                                <option value="{{ $p->id }}">{{ $p->provincia }}</option>
                                @endforeach
                            </select>
                            @error('provincia_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label class="form-label">Cidade</label>
                            <select class="form-select @error('cidade_id') is-invalid @enderror" wire:model="cidade_id" wire:key="cidade-select-{{ $provincia_id ?? 'none' }}" {{ empty($provincia_id) ? 'disabled' : '' }}>
                            <option value="">Selecione...</option>
                            @foreach($cities as $city)
                                <option value="{{ (int)$city['id'] }}">
                                    {{ $city['cidade'] }}{{ !empty($city['capital']) ? ' (Capital)' : '' }}
                                </option>
                            @endforeach
                        </select>
                            @error('cidade_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>
                    @if($cpfFound)
                        <button type="button" class="btn btn-primary" wire:click="saveAndOpen" wire:loading.attr="disabled">
                            Atualizar
                        </button>
                    @else
                        <button type="button" class="btn btn-primary" wire:click="save" wire:loading.attr="disabled">
                            Concluir
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
