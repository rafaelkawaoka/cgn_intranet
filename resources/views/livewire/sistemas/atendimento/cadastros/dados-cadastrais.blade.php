<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="row pt-6">
        <div class="col-md-9">
            <form wire:submit.prevent="save">
                <div class="nav-align-top">
                    <ul class="nav nav-pills mb-4 nav-fill" role="tablist">
                        <li class="nav-item mb-1 mb-sm-0" role="presentation">
                            <button type="button" class="nav-link active waves-effect waves-light" role="tab" data-bs-toggle="tab" data-bs-target="#tab-cadastro" aria-controls="tab-cadastro" aria-selected="true">
                                <span class="d-none d-sm-inline-flex align-items-center">
                                    <i class="icon-base ti tabler-id icon-sm me-1_5"></i>Cadastro
                                </span>
                                <i class="icon-base ti tabler-home icon-sm d-sm-none"></i>
                            </button>
                        </li>
                        {{-- Other tabs placeholders --}}
                        <li class="nav-item mb-1 mb-sm-0" role="presentation">
                            <button type="button" class="nav-link waves-effect waves-light" role="tab" data-bs-toggle="tab" data-bs-target="#tab-documentos" aria-controls="tab-documentos" aria-selected="false" tabindex="-1">
                                <span class="d-none d-sm-inline-flex align-items-center"><i class="icon-base ti tabler-id-badge-2 icon-sm me-1_5"></i>Documentos</span>
                                <i class="icon-base ti tabler-user icon-sm d-sm-none"></i>
                            </button>
                        </li>
                         <li class="nav-item mb-1 mb-sm-0" role="presentation">
                            <button type="button" class="nav-link waves-effect waves-light" role="tab" data-bs-toggle="tab" data-bs-target="#tab-contatos" aria-controls="tab-contatos" aria-selected="false" tabindex="-1">
                                <span class="d-none d-sm-inline-flex align-items-center"><i class="icon-base ti tabler-device-landline-phone icon-sm me-1_5"></i>Contatos</span>
                                <i class="icon-base ti tabler-user icon-sm d-sm-none"></i>
                            </button>
                        </li>
                        <li class="nav-item mb-1 mb-sm-0" role="presentation">
                            <button type="button" class="nav-link waves-effect waves-light" role="tab" data-bs-toggle="tab" data-bs-target="#tab-enderecos" aria-controls="tab-enderecos" aria-selected="false" tabindex="-1">
                                <span class="d-none d-sm-inline-flex align-items-center"><i class="icon-base ti tabler-directions icon-sm me-1_5"></i>Endereços</span>
                                <i class="icon-base ti tabler-user icon-sm d-sm-none"></i>
                            </button>
                        </li>
                        <li class="nav-item mb-1 mb-sm-0" role="presentation">
                            <button type="button" class="nav-link waves-effect waves-light" role="tab" data-bs-toggle="tab" data-bs-target="#tab-servicos" aria-controls="tab-servicos" aria-selected="false" tabindex="-1">
                                <span class="d-none d-sm-inline-flex align-items-center"><i class="icon-base ti tabler-file-text icon-sm me-1_5"></i>Serviços</span>
                                <i class="icon-base ti tabler-user icon-sm d-sm-none"></i>
                            </button>
                        </li>
                        <li class="nav-item mb-1 mb-sm-0" role="presentation">
                            <button type="button" class="nav-link waves-effect waves-light" role="tab" data-bs-toggle="tab" data-bs-target="#tab-saldos" aria-controls="tab-saldos" aria-selected="false" tabindex="-1">
                                <span class="d-none d-sm-inline-flex align-items-center"><i class="icon-base ti tabler-receipt-yen icon-sm me-1_5"></i>Saldo</span>
                                <i class="icon-base ti tabler-user icon-sm d-sm-none"></i>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link waves-effect waves-light" role="tab" data-bs-toggle="tab" data-bs-target="#tab-anotacoes" aria-controls="tab-anotacoes" aria-selected="false" tabindex="-1">
                                <span class="d-none d-sm-inline-flex align-items-center"><i class="icon-base ti tabler-message-dots icon-sm me-1_5"></i>Anotações</span>
                                    <i class="icon-base ti tabler-message-dots icon-sm d-sm-none"></i>
                                <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger ms-1_5">3</span>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-cadastro" role="tabpanel">
                            <h5>Dados Cadastrais</h5>
                            <hr>
                            <div class="row mb-6">
                                <div class="col-md-9">
                                    <label class="form-label" for="nome">Nome Completo:</label>
                                    <input type="text" class="form-control" id="nome" wire:model="nome">
                                    @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="matricula">Matrícula:</label>
                                    <input type="text" class="form-control" id="matricula" value="{{ $matricula }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <div class="col-md-3">
                                    <label class="form-label" for="sexo">Sexo:</label>
                                    <select class="form-select" id="sexo" wire:model="sexo">
                                        <option value="">Selecione...</option>
                                        <option value="F">Feminino</option>
                                        <option value="M">Masculino</option>
                                    </select>
                                    @error('sexo') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="estado_civil">Estado Civil:</label>
                                    <select class="form-select" id="estado_civil" wire:model="estado_civil">
                                        <option value="">Selecione...</option>
                                        <option value="Solteiro(a)">Solteiro(a)</option>
                                        <option value="União estável">União estável</option>
                                        <option value="Casado(a)">Casado(a)</option>
                                        <option value="Divorciado(a)">Divorciado(a)</option>
                                        <option value="Viúvo(a)">Viúvo(a)</option>
                                    </select>
                                    @error('estado_civil') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="escolaridade">Escolaridade:</label>
                                    <select class="form-select" id="escolaridade" wire:model="escolaridade">
                                        <option value="">Selecione...</option>
                                        <option value="Analfabeto(a)">Analfabeto(a)</option>
                                        <option value="Alfabetizado(a)">Alfabetizado(a)</option>
                                        <option value="Ensino fundamental">Ensino fundamental</option>
                                        <option value="Ensino médio">Ensino médio</option>
                                        <option value="Ensino superior">Ensino superior</option>
                                        <option value="Pós graduado(a)">Pós graduado(a)</option>
                                    </select>
                                    @error('escolaridade') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-3" wire:ignore>
                                    <label class="form-label" for="occupation_id">Profissão:</label>
                                    <select class="form-select select-search" id="occupation_id" wire:model="occupation_id">
                                        <option value="">Selecione...</option>
                                        @foreach ($occupations as $profissao)
                                            <option value="{{ $profissao->id }}">{{ $profissao->profissao }}</option>
                                        @endforeach
                                    </select>
                                    @error('occupation_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mb-6">
                                <div class="col-md-2">
                                    <label class="form-label" for="nascimento">Nascimento:</label>
                                    <input type="date" class="form-control" id="nascimento" wire:model="nascimento">
                                    @error('nascimento') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-3" wire:ignore>
                                    <label class="form-label" for="pais_nascimento_id">País de Nascimento:</label>
                                    <select class="form-select select-search" id="pais_nascimento_id" wire:model.live="pais_nascimento_id">
                                        <option value="">Selecione...</option>
                                        @foreach ($countries as $pais)
                                            <option value="{{ $pais->id }}">{{ $pais->pais }}</option>
                                        @endforeach
                                    </select>
                                    @error('pais_nascimento_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Dynamic Place of Birth Logic --}}
                                @php
                                    $selectedCountry = $countries->find($pais_nascimento_id);
                                @endphp

                                @if ($selectedCountry && $selectedCountry->codPais == 'BRA')
                                    <div class="col-md-3">
                                        <label class="form-label" for="estado_nascimento_br_id">Estado (BR):</label>
                                        <select class="form-select" id="estado_nascimento_br_id" wire:model.live="estado_nascimento_br_id">
                                            <option value="">Selecione...</option>
                                            @foreach ($brazilStates as $state)
                                                <option value="{{ $state->id }}">{{ $state->estado }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="cidade_nascimento_br_id">Cidade (BR):</label>
                                        <select class="form-select" id="cidade_nascimento_br_id" wire:model="cidade_nascimento_br_id">
                                            <option value="">Selecione...</option>
                                            @foreach ($brazilCities as $city)
                                                <option value="{{ $city->id }}">{{ $city->cidade }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @elseif ($selectedCountry && $selectedCountry->codPais == 'JPN')
                                    <div class="col-md-3">
                                        <label class="form-label" for="estado_nascimento_jp_id">Província (JP):</label>
                                        <select class="form-select" id="estado_nascimento_jp_id" wire:model.live="estado_nascimento_jp_id">
                                            <option value="">Selecione...</option>
                                            @foreach ($japanProvinces as $province)
                                                <option value="{{ $province->id }}">{{ $province->provincia }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="cidade_nascimento_jp_id">Cidade (JP):</label>
                                        <select class="form-select" id="cidade_nascimento_jp_id" wire:model="cidade_nascimento_jp_id">
                                            <option value="">Selecione...</option>
                                            @foreach ($japanCities as $city)
                                                <option value="{{ $city->id }}">{{ $city->cidade }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @elseif ($selectedCountry)
                                    <div class="col-md-3">
                                        <label class="form-label" for="estado_nascimento_outro">Estado/Província:</label>
                                        <input type="text" class="form-control" id="estado_nascimento_outro" wire:model="estado_nascimento_outro">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="cidade_nascimento_outro">Cidade:</label>
                                        <input type="text" class="form-control" id="cidade_nascimento_outro" wire:model="cidade_nascimento_outro">
                                    </div>
                                @else
                                    <div class="col-md-3"></div><div class="col-md-4"></div>
                                @endif
                            </div>

                            <div class="row mb-9">
                                <div class="col-md-9" wire:ignore>
                                    <label class="form-label" for="nacionalidades">Nacionalidades:</label>
                                    <select id="nacionalidades" class="select2 form-select" multiple wire:model="nacionalidades">
                                        @foreach ($countries as $pais)
                                            <option value="{{ $pais->id }}">{{ $pais->gentilicoF }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="idioma">Idioma:</label>
                                    <select class="form-select" id="idioma" wire:model="idioma">
                                        <option value="">Selecione...</option>
                                        <option value="Português">Português</option>
                                        <option value="Inglês">Inglês</option>
                                        <option value="Espanhol">Espanhol</option>
                                        <option value="Japonês">Japonês</option>
                                        <option value="Outro">Outro</option>
                                    </select>
                                    @error('idioma') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- Other sections placeholders (Conjuge, Filiacao) --}}
                            <hr class="mt-4 pb-4">
                            <div class="card-header header-elements mb-4">
                                <h5 class="mb-0 me-2">Dados do Cônjuge</h5>
                                <div class="card-header-elements ms-auto">
                                    <button type="button" class="btn btn-xs btn-primary waves-effect waves-light">
                                        <span class="icon-base ti tabler-plus icon-xs me-1"></span>Adicionar
                                    </button>
                                </div>
                            </div>
                            <hr>
                             <div class="row mb-6">
                                <div class="col-md-12">
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered table-sm">
                                            <thead>
                                                <tr class="bg-label-secondary">
                                                    <th class="col-md-6 text-start" style="padding: 8px">Nome Completo</th>
                                                    <th class="col-md-2 text-center" style="padding: 8px">Nascimento</th>
                                                    <th class="col-md-2 text-center" style="padding: 8px">Matrícula</th>
                                                    <th class="col-md-2 text-center" style="padding: 8px">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <tr>
                                                    <td class="text-center" colspan="4" style="padding: 30px">Nenhum cadastro vinculado.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                             <hr class="mt-4 pb-4">
                            <div class="card-header header-elements mb-4">
                                <h5 class="mb-0 me-2">Dados de Filiação</h5>
                                <div class="card-header-elements ms-auto">
                                    <button type="button" class="btn btn-xs btn-primary waves-effect waves-light">
                                        <span class="icon-base ti tabler-plus icon-xs me-1"></span>Adicionar
                                    </button>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-9">
                                <div class="col-md-12">
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered table-sm">
                                            <thead>
                                                <tr class="bg-label-secondary">
                                                    <th class="col-md-6 text-start" style="padding: 8px">Nome Completo</th>
                                                    <th class="col-md-2 text-center" style="padding: 8px">Nascimento</th>
                                                    <th class="col-md-2 text-center" style="padding: 8px">Matrícula</th>
                                                    <th class="col-md-2 text-center" style="padding: 8px">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center" colspan="4" style="padding: 30px">Nenhum cadastro vinculado.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        {{-- Empty tabs for now --}}
                        <div class="tab-pane fade" id="tab-documentos" role="tabpanel">
                            <p>Conteúdo da aba Documentos (Não implementado nesta fase)</p>
                        </div>
                        <div class="tab-pane fade" id="tab-contatos" role="tabpanel">
                             <p>Conteúdo da aba Contatos (Não implementado nesta fase)</p>
                        </div>
                        <div class="tab-pane fade" id="tab-enderecos" role="tabpanel">
                             <p>Conteúdo da aba Endereços (Não implementado nesta fase)</p>
                        </div>
                         <div class="tab-pane fade" id="tab-servicos" role="tabpanel">
                             <p>Conteúdo da aba Serviços (Não implementado nesta fase)</p>
                        </div>
                         <div class="tab-pane fade" id="tab-saldos" role="tabpanel">
                             <p>Conteúdo da aba Saldo (Não implementado nesta fase)</p>
                        </div>
                         <div class="tab-pane fade" id="tab-anotacoes" role="tabpanel">
                             <p>Conteúdo da aba Anotações (Não implementado nesta fase)</p>
                        </div>
                    </div>
                     <div class="d-flex justify-content-between pt-6">
                        <div class="">
                            <button type="reset" class="btn btn-label-primary waves-effect">Imprimir</button>
                        </div>
                        <button type="submit" class="btn btn-primary me-4 waves-effect waves-light">Salvar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-3">
             <div class="card mb-6">
                <div class="card-body pt-12">
                    <div class="user-avatar-section">
                        <div class=" d-flex align-items-center flex-column">
                            <img class="img-fluid rounded border mb-4" src="{{ asset('assets/img/placeholders/user_placeholder.jpg') }}" height="250" width="250" alt="User avatar">
                            <div class="user-info text-center">
                                <span class="badge bg-label-secondary">{{ $matricula }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body border-top">
                    <div class="info-container">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <span class="h6">Cadastrado:</span>
                                <span>{{ $cadastro->created_at ? $cadastro->created_at->format('d/m/Y H:i') : '-' }}</span>
                            </li>
                            <li class="mb-2">
                                <span class="h6">Atualizado:</span>
                                <span>{{ $cadastro->updated_at ? $cadastro->updated_at->format('d/m/Y H:i') : '-' }}</span>
                            </li>
                        </ul>
                         <hr>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <span class="h6">Nascimento:</span>
                                <span>{{ $nascimento ? \Carbon\Carbon::parse($nascimento)->format('d/m/Y') : '-' }}</span>
                            </li>
                            <li class="mb-2">
                                <span class="h6">Estado Civil:</span>
                                <span>{{ $estado_civil ?? '-' }}</span>
                            </li>
                            <li class="mb-2">
                                <span class="h6">Profissão:</span>
                                <span>{{ $cadastro->occupation?->profissao ?? '-' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>

@script
<script>
    $(document).ready(function() {
        // Initialize Select2 for Occupation
        $('#occupation_id').select2({
            width: '100%',
        }).on('change', function (e) {
            @this.set('occupation_id', $(this).val());
        });

        // Initialize Select2 for Country
        $('#pais_nascimento_id').select2({
            width: '100%',
        }).on('change', function (e) {
            @this.set('pais_nascimento_id', $(this).val());
        });

        // Initialize Select2 for Nationalities
        $('#nacionalidades').select2({
            placeholder: "Selecione ou digite",
            allowClear: true,
            width: '100%'
        }).on('change', function (e) {
            @this.set('nacionalidades', $(this).val());
        });
    });

    // Re-initialize Select2 after Livewire updates if necessary (though wire:ignore should handle most)
    // But since `pais_nascimento_id` changes trigger re-renders that might affect other select2s if not careful.
    // The `wire:ignore` on the wrapper div or select element prevents Livewire from wiping out the Select2 DOM changes.
</script>
@endscript
