@extends('layouts.app')

@section('content')
<div class="row">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="mb-1">
                <a href="" class="text-body">
                    <i class="icon-base ti tabler-circle-arrow-left icon-22px mb-1"></i>
                </a>
                Matrícula Consular
            </h4>
            <p class="mb-0">Gerenciamento de matrícula consular</p>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-4">
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                <span class="icon-xs icon-base ti tabler-plus me-2"></span>Serviço
            </button>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                <span class="icon-xs icon-base ti tabler-plus me-2"></span>Protocolo
            </button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card card-border-shadow-success h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-success"><i class="icon-base ti tabler-phone-call icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_a">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </h4>
                </div>
                <p class="mb-1">Telefones</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card card-border-shadow-danger h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-danger"><i class="icon-base ti tabler-directions icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_b">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </h4>
                </div>
                <p class="mb-1">Endereços</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card card-border-shadow-primary h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-primary"><i class="icon-base ti tabler-file-text icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_c">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </h4>
                </div>
                <p class="mb-1">Serviços</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card card-border-shadow-warning h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-warning"><i class="icon-base ti tabler-phone icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_d">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </h4>
                </div>
                <p class="mb-1">Protocolos</p>
            </div>
        </div>
    </div>
</div>

<div class="row pt-6">
    <div class="col-md-9">
        <form id="form-cadastro" method="post">
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
                                <label class="form-label" for="basic-default-fullname">Nome Completo:</label>
                                <input type="text" class="form-control" id="" name="" value="{{ $cadastro->nome }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="basic-default-fullname">Matrícula:</label>
                                <input type="text" class="form-control" id="" name="" value="{{ $cadastro->matricula }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <div class="col-md-3">
                                <label class="form-label" for="basic-default-fullname">Sexo:</label>
                                <select class="form-select" id="" name="">
                                    <option selected="">Selecione...</option>
                                    <option value="">Feminino</option>
                                    <option value="">Masculino</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="basic-default-fullname">Estado Civil:</label>
                                <select class="form-select" id="" name="">
                                    <option selected="">Selecione...</option>
                                    <option value="">Solteiro(a)</option>
                                    <option value="">União estável</option>
                                    <option value="">Casado(a)</option>
                                    <option value="">Divorciado(a)</option>
                                    <option value="">Viúvo(a)</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="basic-default-fullname">Escolaridade:</label>
                                <select class="form-select" id="" name="">
                                    <option selected="">Selecione...</option>
                                    <option value="">Analfabeto(a)</option>
                                    <option value="">Alfabetizado(a)</option>
                                    <option value="">Ensino fundamental</option>
                                    <option value="">Ensino médio</option>
                                    <option value="">Ensino superior</option>
                                    <option value="">Pós graduado(a)</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="basic-default-fullname">Profissão:</label>
                                <select class="form-select select-search" id="" name="">
                                    <option selected="">Selecione...</option>
                                    @foreach (App\Models\Occupation::orderBy('profissao')->get() as $profissao)
                                    <option value="{{ $profissao->is }}">{{ $profissao->profissao }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <div class="col-md-2">
                                <label class="form-label" for="basic-default-fullname">Nascimento:</label>
                                <input type="date" class="form-control" id="" name="" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="basic-default-fullname">País:</label>
                                <select class="form-select select-search" id="" name="">
                                    <option selected="">Selecione...</option>
                                    @foreach (App\Models\Country::orderBy('pais')->get() as $pais)
                                    <option value="{{ $pais->id }}">{{ $pais->pais }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="basic-default-fullname">Estado/Província:</label>
                                <select class="form-select select-search" id="" name="">
                                    <option selected="">Selecione...</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="basic-default-fullname">Cidade:</label>
                                <select class="form-select select-search" id="" name="">
                                    <option selected="">Selecione...</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-9">
                            <div class="col-md-9">
                                <label class="form-label" for="basic-default-fullname">Nacionalidades:</label>
                                <select id="cadastro_nacionalidades" class="select2 form-select" multiple>
                                    @foreach (App\Models\Country::orderBy('pais')->get() as $pais)
                                    <option value="{{ $pais->id }}">{{ $pais->gentilicoF }}</option>
                                    @endforeach
                                </select> 
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="basic-default-fullname">Idioma:</label>
                                <select class="form-select" id="" name="">
                                    <option selected="">Selecione...</option>
                                    <option value="">Português</option>
                                    <option value="">Inglês</option>
                                    <option value="">Espanhol</option>
                                    <option value="">Japonês</option>
                                    <option value="">Outro</option>
                                </select>
                            </div>
                        </div>
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
                                                <td class="text-start" style="padding: 5px; padding-left: 10px">
                                                    Fulano Fulano da Silva Sauro e Sauro
                                                </td>
                                                <td class="text-center" style="padding: 5px">
                                                    00/00/0000
                                                </td>
                                                <td class="text-center" style="padding: 5px">
                                                    00/00/0000
                                                </td>
                                                <td class="text-center" style="padding: 5px">
                                                    <button class="btn btn-text-primary btn-sm rounded-pill waves-effect btn-icon" title="Ver cadastro"><i class="icon-base ti tabler-id icon-22px"></i></button>
                                                    <button class="btn btn-text-primary btn-sm rounded-pill waves-effect btn-icon" title="Remover vínculo"><i class="icon-base ti tabler-unlink icon-22px"></i></button>
                                                </td>
                                            </tr>
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
                                                <td class="text-start" style="padding: 5px; padding-left: 10px">
                                                    Fulano Fulano da Silva Sauro e Sauro
                                                </td>
                                                <td class="text-center" style="padding: 5px">
                                                    00/00/0000
                                                </td>
                                                <td class="text-center" style="padding: 5px">
                                                    00/00/0000
                                                </td>
                                                <td class="text-center" style="padding: 5px">
                                                    <button class="btn btn-text-primary btn-sm rounded-pill waves-effect btn-icon" title="Ver cadastro"><i class="icon-base ti tabler-id icon-22px"></i></button>
                                                    <button class="btn btn-text-primary btn-sm rounded-pill waves-effect btn-icon" title="Remover vínculo"><i class="icon-base ti tabler-unlink icon-22px"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center" colspan="4" style="padding: 30px">Nenhum cadastro vinculado.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-documentos" role="tabpanel">
                        <h5>Documentação</h5>
                        <hr>
                        <div class="row mb-6">
                            <div class="col-md-3">
                                <label class="form-label" for="basic-default-fullname">CPF:</label>
                                <input type="text" class="form-control" id="" name="" value="">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <div class="col-md-2">
                                <label class="form-label" for="basic-default-fullname">Identidade:</label>
                                <select class="form-select" id="" name="">
                                    <option selected="">Selecione...</option>
                                    <option value="CIN">CIN</option>
                                    <option value="RG">RG</option>
                                    <option value="RNE">RNE</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="basic-default-fullname">Número do documento:</label>
                                <input type="text" class="form-control" id="" name="" value="">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label" for="basic-default-fullname">Órgão emissor:</label>
                                <input type="text" class="form-control" id="" name="" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="basic-default-fullname">Data de emissão:</label>
                                <input type="date" class="form-control" id="" name="" value="" max="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <div class="col-md-3">
                                <label class="form-label" for="basic-default-fullname">Título de eleitor:</label>
                                <input type="text" class="form-control" id="" name="" value="">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label" for="basic-default-fullname">Seção eleitoral:</label>
                                <input type="text" class="form-control" id="" name="" value="">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label" for="basic-default-fullname">Zona eleitoral:</label>
                                <input type="text" class="form-control" id="" name="" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="basic-default-fullname">Local de votação:</label>
                                <select class="form-select" id="" name="">
                                    <option selected="">Selecione...</option>
                                    <option value="">Exterior - Nagoia</option>
                                    <option value="">Exterior - Toyohashi</option>
                                    <option value="">Exterior - Suzuka</option>
                                    <option value="">Exterior - Hiroshima</option>
                                    <option value="">Exterior - Toyama</option>
                                    <option value="">Exterior - Japão Outros</option>
                                    <option value="">Exterior - Outros</option>
                                    <option value="">Território Nacional</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-9">
                            <div class="col-md-3">
                                <label class="form-label" for="basic-default-fullname">Zayriu card:</label>
                                <input type="text" class="form-control" id="" name="" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="basic-default-fullname">Habilitação japonesa:</label>
                                <input type="text" class="form-control" id="" name="" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="basic-default-fullname">Passaporte estrangeiro:</label>
                                <input type="text" class="form-control" id="" name="" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="basic-default-fullname">Passaporte estrangeiro validade:</label>
                                <input type="date" class="form-control" id="" name="" value="">
                            </div>
                        </div>
                        <hr class="mt-4 pb-4">
                        <div class="card-header header-elements mb-4">
                            <h5 class="mb-0 me-2">Passaportes</h5>
                            <div class="card-header-elements ms-auto">
                                <button type="button" class="btn btn-xs btn-primary waves-effect waves-light">
                                    <span class="icon-base ti tabler-plus icon-xs me-1"></span>Adicionar
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="bg-label-secondary">
                                        <th class="col-md-2 text-center" style="padding: 8px">Número</th>
                                        <th class="col-md-2 text-center" style="padding: 8px">Expedidor</th>
                                        <th class="col-md-2 text-center" style="padding: 8px">Validade</th>
                                        <th class="col-md-2 text-center" style="padding: 8px">Status</th>
                                        <th class="col-md-2 text-center" style="padding: 8px">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center" style="padding: 5px">
                                            FD987512
                                        </td>
                                        <td class="text-center" style="padding: 5px">
                                            NAGOIA CG
                                        </td>
                                        <td class="text-center" style="padding: 5px">
                                            00/00/0000
                                        </td>
                                        <td class="text-center" style="padding: 5px">
                                            <span class="badge bg-label-success me-1">Válido</span>
                                        </td>
                                        <td class="text-center" style="padding: 5px">
                                            <button class="btn btn-text-primary btn-sm rounded-pill waves-effect btn-icon" title="Editar"><i class="icon-base ti tabler-edit icon-22px"></i></button>
                                            <button class="btn btn-text-primary btn-sm rounded-pill waves-effect btn-icon" title="Excluir"><i class="icon-base ti tabler-trash icon-22px"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" colspan="5" style="padding: 30px">Nenhum passaporte cadastrado.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr class="mt-4 pb-4">
                        <div class="card-header header-elements mb-4">
                            <h5 class="mb-0 me-2">Digitalizações</h5>
                            <div class="card-header-elements ms-auto">
                                <button type="button" class="btn btn-xs btn-primary waves-effect waves-light">
                                    <span class="icon-base ti tabler-plus icon-xs me-1"></span>Adicionar
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="bg-label-secondary">
                                        <th class="text-center" style="padding: 8px">Tipo de documento</th>
                                        <th class="col-md-2 text-center" style="padding: 8px">Data Upload</th>
                                        <th class="text-center" style="padding: 8px">Funcionário</th>
                                        <th class="col-md-2 text-center" style="padding: 8px">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center" style="padding: 5px">
                                            Declaração Consular de Estado Civil
                                        </td>
                                        <td class="text-center" style="padding: 5px">
                                            00/00/0000 00:00
                                        </td>
                                        <td class="text-center" style="padding: 5px">
                                            Nome do Funcionário que fez upload
                                        </td>
                                        <td class="text-center" style="padding: 5px">
                                            <button class="btn btn-text-primary btn-sm rounded-pill waves-effect btn-icon" title="Visualizar"><i class="icon-base ti tabler-photo icon-22px"></i></button>
                                            <button class="btn btn-text-primary btn-sm rounded-pill waves-effect btn-icon" title="Excluir"><i class="icon-base ti tabler-trash icon-22px"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" colspan="5" style="padding: 30px">Nenhum documento digitalizado.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-contatos" role="tabpanel">
                        <div class="card-header header-elements mb-4">
                            <h5 class="mb-0 me-2">Números de telefone</h5>
                            <div class="card-header-elements ms-auto">
                                <button type="button" class="btn btn-xs btn-primary waves-effect waves-light">
                                    <span class="icon-base ti tabler-plus icon-xs me-1"></span>Adicionar
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="bg-label-secondary">
                                        <th class="col-md-2 text-center" style="padding: 8px">Número</th>
                                        <th class="col-md-2 text-center" style="padding: 8px">Tipo</th>
                                        <th class="col-md-2 text-center" style="padding: 8px">Cadastrado</th>
                                        <th class="col-md-2 text-center" style="padding: 8px">Atualizado</th>
                                        <th class="col-md-2 text-center" style="padding: 8px">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center" style="padding: 5px">
                                            00 0000-0000
                                        </td>
                                        <td class="text-center" style="padding: 5px">
                                            Celular
                                        </td>
                                        <td class="text-center" style="padding: 5px">
                                            00/00/0000 00:00
                                        </td>
                                        <td class="text-center" style="padding: 5px">
                                            00/00/0000 00:00
                                        </td>
                                        <td class="text-center" style="padding: 5px">
                                            <button class="btn btn-text-primary btn-sm rounded-pill waves-effect btn-icon" title="Confirmar"><i class="icon-base ti tabler-square-check icon-22px"></i></button>
                                            <button class="btn btn-text-primary btn-sm rounded-pill waves-effect btn-icon" title="Editar"><i class="icon-base ti tabler-edit icon-22px"></i></button>
                                            <button class="btn btn-text-primary btn-sm rounded-pill waves-effect btn-icon" title="Excluir"><i class="icon-base ti tabler-trash icon-22px"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" colspan="5" style="padding: 30px">Nenhum telefone cadastrado.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr class="mt-4 pb-4">
                        <div class="card-header header-elements mb-4">
                            <h5 class="mb-0 me-2">Endereços eletrônicos</h5>
                            <div class="card-header-elements ms-auto">
                                <button type="button" class="btn btn-xs btn-primary waves-effect waves-light">
                                    <span class="icon-base ti tabler-plus icon-xs me-1"></span>Adicionar
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="bg-label-secondary">
                                        <th class="text-center" style="padding: 8px">Endereço Eletrônico</th>
                                        <th class="col-md-2 text-center" style="padding: 8px">Cadastrado</th>
                                        <th class="col-md-2 text-center" style="padding: 8px">Atualizado</th>
                                        <th class="col-md-2 text-center" style="padding: 8px">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center" style="padding: 5px">
                                            fulanofulanofulano@provedor.com.br
                                        </td>
                                        <td class="text-center" style="padding: 5px">
                                            00/00/0000 00:00
                                        </td>
                                        <td class="text-center" style="padding: 5px">
                                            00/00/0000 00:00
                                        </td>
                                        <td class="text-center" style="padding: 5px">
                                            <button class="btn btn-text-primary btn-sm rounded-pill waves-effect btn-icon" title="Confirmar"><i class="icon-base ti tabler-square-check icon-22px"></i></button>
                                            <button class="btn btn-text-primary btn-sm rounded-pill waves-effect btn-icon" title="Editar"><i class="icon-base ti tabler-edit icon-22px"></i></button>
                                            <button class="btn btn-text-primary btn-sm rounded-pill waves-effect btn-icon" title="Excluir"><i class="icon-base ti tabler-trash icon-22px"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" colspan="5" style="padding: 30px">Nenhum endereço eletrônico cadastrado.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr class="mt-4 pb-4">
                        <div class="card-header header-elements mb-4">
                            <h5 class="mb-0 me-2">Contatos de emergência</h5>
                            <div class="card-header-elements ms-auto">
                                <button type="button" class="btn btn-xs btn-primary waves-effect waves-light">
                                    <span class="icon-base ti tabler-plus icon-xs me-1"></span>Adicionar
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="bg-label-secondary">
                                        <th class="text-center" style="padding: 8px">Nome</th>
                                        <th class="col-md-2 text-center" style="padding: 8px">Telefone</th>
                                        <th class="col-md-2 text-center" style="padding: 8px">Cadastrado</th>
                                        <th class="col-md-2 text-center" style="padding: 8px">Atualizado</th>
                                        <th class="col-md-2 text-center" style="padding: 8px">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center" style="padding: 5px">
                                            Fulando Fulano da Silva Sauro e Sauro
                                        </td>
                                        <td class="text-center" style="padding: 5px">
                                            (11) 99999-9999
                                        </td>
                                        <td class="text-center" style="padding: 5px">
                                            00/00/0000 00:00
                                        </td>
                                        <td class="text-center" style="padding: 5px">
                                            00/00/0000 00:00
                                        </td>
                                        <td class="text-center" style="padding: 5px">
                                            <button class="btn btn-text-primary btn-sm rounded-pill waves-effect btn-icon" title="Confirmar"><i class="icon-base ti tabler-square-check icon-22px"></i></button>
                                            <button class="btn btn-text-primary btn-sm rounded-pill waves-effect btn-icon" title="Editar"><i class="icon-base ti tabler-edit icon-22px"></i></button>
                                            <button class="btn btn-text-primary btn-sm rounded-pill waves-effect btn-icon" title="Excluir"><i class="icon-base ti tabler-trash icon-22px"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" colspan="5" style="padding: 30px">Nenhum contato de emergência cadastrado.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr class="mt-4 pb-4">
                        <div class="card-header header-elements mb-4">
                            <h5 class="mb-0 me-2">Observações</h5>
                            <div class="card-header-elements ms-auto"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="form-control" id="" name="" rows="8"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-enderecos" role="tabpanel">
                        <div class="card-header header-elements mb-4">
                            <h5 class="mb-0 me-2">Endereços no Japão</h5>
                            <div class="card-header-elements ms-auto">
                                <button type="button" class="btn btn-xs btn-primary waves-effect waves-light">
                                    <span class="icon-base ti tabler-plus icon-xs me-1"></span>Adicionar
                                </button>
                            </div>
                        </div>
                        <hr>
                        @for ($i = 0; $i < 3; $i++)
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="card shadow-none border rounded">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <a href="javascript:;" class="d-flex align-items-center">
                                                <div class="avatar me-2 bg-label-primary border rounded">
                                                    <i class="icon-base ti tabler-map-pin icon-32px" style="margin-left:4px; margin-top:2px"></i>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-0">Aichi-ken, Nagoya-shi</h6>
                                                    <small class="text-body d-block">Endereço Atual</small>
                                                </div>
                                            </a>
                                            <div class="ms-auto">
                                            <ul class="list-inline mb-0 d-flex align-items-center">
                                                <li class="list-inline-item me-0">
                                                    <a href="javascript:void(0);" class="d-flex align-self-center btn btn-icon rounded-pill waves-effect" title="Definir padrão"><i class="icon-base ti tabler-star icon-22px text-body-secondary"></i></a>
                                                </li>
                                                <li class="list-inline-item me-0">
                                                    <a href="javascript:void(0);" class="d-flex align-self-center btn btn-icon rounded-pill waves-effect" title="Imprimir"><i class="icon-base ti tabler-printer icon-22px text-body-secondary"></i></a>
                                                </li>
                                                <li class="list-inline-item me-0">
                                                    <a href="javascript:void(0);" class="d-flex align-self-center btn btn-icon rounded-pill waves-effect" title="Editar"><i class="icon-base ti tabler-edit icon-22px text-body-secondary"></i></a>
                                                </li>
                                                <li class="list-inline-item me-0">
                                                    <a href="javascript:void(0);" class="d-flex align-self-center btn btn-icon rounded-pill waves-effect" title="Excluir"><i class="icon-base ti tabler-trash icon-22px text-body-secondary"></i></a>
                                                </li>
                                            </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="mb-3 pb-1">
                                            Aichi-ken, Nagoya-shi<br>
                                            Naka-ku, Marunouchi 1-10-29<br>
                                            Shirakawa 8th BLDG 2F<br>
                                            〒460-0011
                                        </p>
                                        <hr>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                <small>Cadastrado: 00/00/0000 00:00 <br>Atualizado: 00/00/0000 00:00</small>
                                            </div>
                                            <div class="ms-auto">
                                            <a href="javascript:;"><span class="badge bg-label-success">Padrão</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                        <hr>
                        <div class="card-header header-elements mb-4">
                            <h5 class="mb-0 me-2">Endereços no Brasil</h5>
                            <div class="card-header-elements ms-auto">
                                <button type="button" class="btn btn-xs btn-primary waves-effect waves-light">
                                    <span class="icon-base ti tabler-plus icon-xs me-1"></span>Adicionar
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow-none border rounded">
                                    <div class="card-body text-center">
                                        <p class="card-text py-10">Nenhum endereço cadastrado.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-header header-elements mb-4">
                            <h5 class="mb-0 me-2">Outros Endereços</h5>
                            <div class="card-header-elements ms-auto">
                                <button type="button" class="btn btn-xs btn-primary waves-effect waves-light">
                                    <span class="icon-base ti tabler-plus icon-xs me-1"></span>Adicionar
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow-none border rounded">
                                    <div class="card-body text-center">
                                        <p class="card-text py-10">Nenhum endereço cadastrado.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-servicos" role="tabpanel">
                        <h5>Serviços</h5>
                        <hr>
                        <div class="accordion accordion-custom-button mt-3 mb-3" id="accordionCustom">
                            @for ($a = 0; $a < 10; $a++)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingCustomOne">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionCustomOne" aria-expanded="false" aria-controls="accordionCustomOne">
                                    Nome do Serviço
                                    </button>
                                </h2>
                                <div id="accordionCustomOne" class="accordion-collapse collapse" aria-labelledby="headingCustomOne" data-bs-parent="#accordionCustom" style="">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <ul class="timeline ps-4 mb-2">
                                                    <li class="timeline-item ps-6 pb-3 border-dashed">
                                                        <span class="timeline-indicator-advanced timeline-indicator-success border-0 shadow-none">
                                                            <i class="icon-base ti tabler-mail-opened"></i>
                                                        </span>
                                                        <div class="timeline-event ps-0 pb-0">
                                                            <div class="timeline-header">
                                                                <small class="text-success text-uppercase">Recebimento <span class="badge bg-label-success ms-2">410.1.251215-000002</span></small>
                                                            </div>
                                                            <h6 class="my-50">Nome do Funcionário</h6>
                                                            <small class="text-body">Sep 01, 7:53 AM</small>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item ps-6 pb-3 border-dashed">
                                                        <span class="timeline-indicator-advanced timeline-indicator-success border-0 shadow-none">
                                                            <i class="icon-base ti tabler-browser-plus"></i>
                                                        </span>
                                                        <div class="timeline-event ps-0 pb-0">
                                                            <div class="timeline-header">
                                                                <small class="text-success text-uppercase">Lançamento no SC <span class="badge bg-label-success ms-2">410.1.251215-000002</span></small>
                                                            </div>
                                                            <h6 class="my-50">Nome do Funcionário</h6>
                                                            <small class="text-body">Sep 01, 7:53 AM</small>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item ps-6 pb-3 border-dashed">
                                                        <span class="timeline-indicator-advanced timeline-indicator-success border-0 shadow-none">
                                                            <i class="icon-base ti tabler-basket-check"></i>
                                                        </span>
                                                        <div class="timeline-event ps-0 pb-0">
                                                            <div class="timeline-header">
                                                                <small class="text-success text-uppercase">Checkin de Atendimento <span class="badge bg-label-success ms-2">202500-000000</span></small>
                                                            </div>
                                                            <h6 class="my-50">Veronica Herman</h6>
                                                            <small class="text-body">Sep 03, 8:02 AM</small>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item ps-6 pb-3 border-dashed">
                                                        <span class="timeline-indicator-advanced timeline-indicator-success border-0 shadow-none">
                                                            <i class="icon-base ti tabler-settings-check"></i>
                                                        </span>
                                                        <div class="timeline-event ps-0 pb-0">
                                                            <div class="timeline-header">
                                                                <small class="text-success text-uppercase">Processamento <span class="badge bg-label-success ms-2">202500-000000</span></small>
                                                            </div>
                                                            <h6 class="my-50">Veronica Herman</h6>
                                                            <small class="text-body">Sep 03, 8:02 AM</small>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item ps-6 pb-3 border-dashed">
                                                        <span class="timeline-indicator-advanced timeline-indicator-success border-0 shadow-none">
                                                            <i class="icon-base ti tabler-send"></i>
                                                        </span>
                                                        <div class="timeline-event ps-0 pb-0">
                                                            <div class="timeline-header">
                                                                <small class="text-success text-uppercase">Entrega / Devolução <span class="badge bg-label-success ms-2">0000-0000-0000-0000</span></small>
                                                            </div>
                                                            <h6 class="my-50">Veronica Herman</h6>
                                                            <small class="text-body">Sep 03, 8:02 AM</small>
                                                        </div>
                                                    </li>
                                                    <li class="timeline-item ps-6 border-transparent">
                                                        <span class="timeline-indicator-advanced timeline-indicator-warning border-0 shadow-none">
                                                            <i class="icon-base ti tabler-coin-yen mt-1"></i>
                                                        </span>
                                                        <div class="timeline-event ps-0 pb-0">
                                                            <div class="timeline-header">
                                                            <small class="text-warning text-uppercase fw-medium">Renda Consular <span class="badge bg-label-warning ms-2">0000-0000-0000-0000</span></small>
                                                            </div>
                                                            <h6 class="my-50">Veronica Herman</h6>
                                                            <small class="text-body">Sep 04, 8:18 AM</small>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="card-body">
                                                    <ul class="p-0 m-0">
                                                        @for ($i = 0; $i < 5; $i++)
                                                        <li class="d-flex pb-1 align-items-center p-2 border rounded mb-2">
                                                            <div class="badge bg-label-primary me-4 rounded p-1_5">
                                                                <i class="icon-base ti tabler-scan icon-md"></i>
                                                            </div>
                                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                <div class="me-2">
                                                                    <h6 class="mb-0">Tipo de Documento</h6>
                                                                    <small class="text-body d-block">00000Kb</small>
                                                                </div>
                                                                <div class="user-progress d-flex align-items-center gap-1">
                                                                    <button class="btn btn-text-primary rounded-pill waves-effect btn-icon" title="Adicionar Serviço"><i class="icon-base ti tabler-photo-share icon-22px"></i></button>
                                                                    <button class="btn btn-text-primary rounded-pill waves-effect btn-icon" title="Adicionar Serviço"><i class="icon-base ti tabler-download icon-22px"></i></button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow-none border rounded">
                                    <div class="card-body text-center">
                                        <p class="card-text py-10">Nenhum registro de serviço requerido.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-saldos" role="tabpanel">
                        <div class="card-header header-elements mb-4">
                            <h5 class="mb-0 me-2">Extrato de Pagamentos</h5>
                            <div class="card-header-elements ms-auto">
                                <button type="button" class="btn btn-xs btn-primary waves-effect waves-light">
                                    <span class="icon-base ti tabler-printer icon-xs me-1"></span>Imprimir
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped table-sm">
                                <thead class="border-0">
                                    <tr class="bg-label-primary">
                                        <th style="padding: 8px; padding-left: 20px">Movimentação</th>
                                        <th style="padding: 8px" class="text-center">Data</th>
                                        <th style="padding: 8px" class="text-center">Funcionário</th>
                                        <th style="padding: 8px" class="text-end">Valor</th>
                                        <th style="padding: 8px; padding-left: 10px" class="text-end">Saldo</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0 table-border-top-0">
                                    <tr>
                                        <td style="padding: 5px; padding-left: 20px">
                                            <span class="fw-medium">Depósito Bancário</span>
                                        </td>
                                        <td style="padding: 5px" class="text-center">
                                            00/00/0000
                                        </td>
                                        <td style="padding: 5px" class="text-center">
                                            Nome do Funcionário
                                        </td>
                                        <td style="padding: 5px" class="text-end">
                                            <span class="text-success">000.000 C</span>
                                        </td>
                                        <td style="padding: 5px; padding-right:10px" class="text-end">
                                            000.000 C
                                        </td>
                                    </tr>
                                    @for ($i = 0; $i < 25; $i++)
                                    <tr>
                                        <td style="padding: 5px; padding-left: 20px">
                                            <span class="fw-medium">Nome ou descrição do emolumento</span>
                                        </td>
                                        <td style="padding: 5px" class="text-center">
                                            00/00/0000
                                        </td>
                                        <td style="padding: 5px" class="text-center">
                                            Nome do Funcionário
                                        </td>
                                        <td style="padding: 5px" class="text-end">
                                            <span class="text-danger">00.000 D</span>
                                        </td>
                                        <td style="padding: 5px; padding-right:10px" class="text-end">
                                            000.000 C
                                        </td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow-none border rounded">
                                    <div class="card-body text-center">
                                        <p class="card-text py-10">Nenhum registro de pagamentos.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-anotacoes" role="tabpanel">
                        <div class="card-header header-elements mb-4">
                            <h5 class="mb-0 me-2">Anotações</h5>
                            <div class="card-header-elements ms-auto">
                                <button type="button" class="btn btn-xs btn-primary waves-effect waves-light">
                                    <span class="icon-base ti tabler-plus icon-xs me-1"></span>Adicionar
                                </button>
                            </div>
                        </div>
                        <hr>
                        @for ($i = 0; $i < 3; $i++)
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="card-body border rounded">
                                    <div class="d-flex align-items-center mb-3 pb-1 p-5">
                                        <div class="avatar me-2">
                                            <img class="rounded-circle border" src="{{ asset('assets/img/placeholders/user_placeholder.jpg') }}" alt="Avatar">
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-0">Nome do Funcionário</h6>
                                            <small class="text-body d-block">Qua, 17 Dez 2025 00:00h</small>
                                        </div>
                                        <div class="ms-auto">
                                            <ul class="list-inline mb-0 d-flex align-items-center">
                                                <li class="list-inline-item me-0">
                                                    <a href="javascript:void(0);" class="d-flex align-self-center btn btn-icon btn-text-secondary rounded-pill waves-effect" title="Excluir"><i class="icon-base ti tabler-trash icon-22px text-body-secondary"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="border rounded mx-4 my-3 pb-0 p-3 bg-label-warning">
                                        <p class="pt-2">Curabitur varius ipsum felis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque nec sapien nec felis facilisis convallis et id erat. Morbi blandit ornare bibendum. Suspendisse potenti. Fusce eget mauris facilisis, venenatis nisl a, mollis nunc. Sed vestibulum libero id magna placerat imperdiet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow-none border rounded">
                                    <div class="card-body text-center">
                                        <p class="card-text py-10">Nenhuma anotação incluída.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <span class="badge bg-label-secondary">JPN123456789</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border-top">
                <div class="info-container">
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <span class="h6">Cadastrado:</span>
                            <span>00/00/0000 00:00</span>
                        </li>
                        <li class="mb-2">
                            <span class="h6">Atualizado:</span>
                            <span>00/00/0000 00:00</span>
                        </li>
                    </ul>
                    <hr>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <span class="h6">Nascimento:</span>
                            <span>00/00/0000</span>
                        </li>
                        <li class="mb-2">
                            <span class="h6">Estado Civil:</span>
                            <span>Solteiro</span>
                        </li>
                        <li class="mb-2">
                            <span class="h6">Profissão:</span>
                            <span>Profissão</span>
                        </li>
                    </ul>
                    <hr>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <span class="h6">Telefone:</span>
                            <span>000 0000-0000</span>
                        </li>
                        <li class="mb-2">
                            <span class="h6">Provincia:</span>
                            <span>Aichi-ken</span>
                        </li>
                        <li class="mb-2">
                            <span class="h6">Cidade:</span>
                            <span>Nagoia-shi</span>
                        </li>
                        <li class="mb-2">
                            <span class="h6">Idioma:</span>
                            <span>Português</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body border-top">
                <h5 class="mb-6">Protocolos Recentes</h5>
                <ul class="list-unstyled mb-0">
                    @for ($i = 0; $i < 5; $i++)
                    <li class="mb-4">
                        <div class="d-flex align-items-center">
                            <div class="badge bg-label-secondary text-body p-2 me-4 rounded"><i class="icon-base ti tabler-phone-calling icon-md"></i></div>
                                <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                                <div class="me-0">
                                    <h6 class="mb-0">#202512-150017</h6>
                                    <small class="text-body">15/12/2025 00:00</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="ms-2 badge bg-label-success">Aguardando</div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endfor
                </ul>
                <div class="col-12 text-center">
                    <a href="javascript:void(0);" class="btn btn-label-primary w-100 d-grid waves-effect waves-light">Ver todos</a>
                    </div>
            </div>
      </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('.select-search').select2({
        width: '100%',
    });
});
    $('#cadastro_nacionalidades').select2({
        placeholder: "Selecione ou digite",
        allowClear: true,
        tags: false,
        tokenSeparators: [',', ' ']
    });


</script>
@endsection')
