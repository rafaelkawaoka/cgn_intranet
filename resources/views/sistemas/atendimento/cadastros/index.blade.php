@extends('layouts.app')

@section('content')
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
            <button type="submit" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modal-cadastro">Novo cadastro</button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card card-border-shadow-success h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-success"><i class="icon-base ti tabler-calendar-month icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_a">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </h4>
                </div>
                <p class="mb-1">Esta semana</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card card-border-shadow-danger h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-danger"><i class="icon-base ti tabler-calendar-week icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_b">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </h4>
                </div>
                <p class="mb-1">Em {{ mb_strtolower(nomeDoMes(date('m'))) }}</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card card-border-shadow-secondary h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-secondary"><i class="icon-base ti tabler-calendar-stats icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_c">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </h4>
                </div>
                <p class="mb-1">Ano de {{ date('Y') }}</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card card-border-shadow-primary h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-primary"><i class="icon-base ti tabler-users icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_d">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
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
                <h5 class="card-title mb-0">Pesquisa de cadastros (0)</h5>
                <div class="row pt-8">
                    <div class="col">
                        <label for="search_cpf" class="form-label">CPF:</label>
                        <input type="text" class="form-control mask-cpf" name="search_cpf">
                    </div>
                    <div class="col-5">
                        <label for="search_name" class="form-label">Nome:</label>
                        <input type="text" class="form-control" name="search_name" id="search_name">
                    </div>
                    <div class="col">
                        <label for="search_email" class="form-label">Celular:</label>
                        <input type="text" class="form-control mask-celular" name="search_email">
                    </div>
                    <div class="col">
                        <label for="search_matricula" class="form-label">Matrícula:</label>
                        <input type="text" class="form-control mask-matricula" data-prefixo="{{ env('MATRICULA_PREFIX') }}" name="search_matricula">
                    </div>
                    <div class="col">
                        <label for="search_nascimento" class="form-label">Nascimento:</label>
                        <input type="date" class="form-control" max="{{ date('Y-m-d') }}" name="search_nascimento">
                    </div>
                </div>
            </div>
            <div class="card-body mt-6">
                <table class="table border table-striped">
                    <thead class="bg-label-secondary">
                        <tr>
                            <th class="col-4">
                                Cadastro
                                <span class="dt-column-order"></span>
                            </th>
                            <th>
                                Filiação
                                <span class="dt-column-order"></span>
                            </th>
                            <th class="text-center">
                                Matrícula
                                <span class="dt-column-order"></span>
                            </th>
                            <th>
                                Localidade
                                <span class="dt-column-order"></span>
                            </th>
                            <th class="text-center">
                                Atualização
                                <span class="dt-column-order"></span>
                            </th>
                            <th class="text-center">
                                Ações
                                <span class="dt-column-order"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 25; $i++)
                        <tr>
                            <td>
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="avatar-wrapper">
                                        <div class="me-4 border rounded">
                                            <a href="#">
                                                <img src="{{ asset('assets/img/placeholders/user_placeholder.jpg') }}" alt="User" class="rounded" width="46">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a class="text-heading text-nowrap fw-medium text-body" href="#">Fulano Fulano da Silva Sauro e Sauro</a>
                                        <small class="text-body d-block">00/00/0000 (00) M</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-body">
                                    <small class="text-body d-block">Fulano Fulano da Silva Sauro e Sauro</small>
                                    <small class="text-body d-block">Fulano Fulano da Silva Sauro e Sauro</small>
                                </div>
                            </td>
                            <td>
                                <div class="text-body text-center">
                                    <small class="text-body d-block">JPN123456789</small>
                                    <small class="text-body d-block">CPF: 123.4**.**9-09</small>
                                </div>
                            </td>
                            <td>
                                <div class="text-body text-center">
                                    <small class="text-body d-block">Província</small>
                                    <small class="text-body d-block">Cidade</small>
                                </div>
                            </td>
                            <td>
                                <div class="text-body text-center">
                                    <small class="text-body d-block">00/00/0000</small>
                                    <small class="text-body d-block">Nome do Funcionário</small>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="d-inline-block text-nowrap">
                                    <button class="btn btn-text-secondary rounded-pill waves-effect btn-icon" title="Adicionar Protocolo" data-bs-toggle="modal" data-bs-target="#modal-protocolo"><i class="icon-base ti tabler-phone-plus icon-22px"></i></button>
                                    <button class="btn btn-text-secondary rounded-pill waves-effect btn-icon" title="Adicionar Serviço"><i class="icon-base ti tabler-file-text-spark icon-22px"></i></button>
                                    <button class="btn btn-text-secondary rounded-pill waves-effect btn-icon" title="Unificar Cadastro"><i class="icon-base ti tabler-users-group icon-22px"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <div class="card-footer pb-0">
                <div class="row justify-content-between">
                    <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto mt-0">
                        <span class="text-body-secondary mb-5">Exibindo de 1 até 1 de 2</span>
                    </div>
                    <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto mt-0">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-rounded">
                                <li class="page-item first">
                                    <a class="page-link waves-effect" href="javascript:void(0);"><i class="icon-base ti tabler-chevrons-left icon-sm"></i></a>
                                </li>
                                <li class="page-item prev">
                                    <a class="page-link waves-effect" href="javascript:void(0);"><i class="icon-base ti tabler-chevron-left icon-sm"></i></a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link waves-effect" href="javascript:void(0);">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link waves-effect" href="javascript:void(0);">2</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link waves-effect waves-light" href="javascript:void(0);">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link waves-effect" href="javascript:void(0);">4</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link waves-effect" href="javascript:void(0);">5</a>
                                </li>
                                <li class="page-item next">
                                    <a class="page-link waves-effect" href="javascript:void(0);"><i class="icon-base ti tabler-chevron-right icon-sm"></i></a>
                                </li>
                                <li class="page-item last">
                                    <a class="page-link waves-effect" href="javascript:void(0);"><i class="icon-base ti tabler-chevrons-right icon-sm"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-cadastro" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Novo Cadastro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-4">
                        <label for="cadastro_cpf" class="form-label">CPF:</label>
                        <input type="text" id="cadastro_cpf" class="form-control mask-cpf">
                    </div>
                    <div class="col">
                        <label for="cadastro_nome" class="form-label">Nome completo:<span class="text-danger">*</span></label>
                        <input type="text" id="cadastro_nome" class="form-control"/>
                    </div>
                </div>
                <div class="row g-4 mb-4">
                    <div class="col mb-0">
                        <label for="cadastro_nascimento" class="form-label">Nascimento</label>
                        <input type="date" id="cadastro_nascimento" max="{{ date('Y-m-d') }}" class="form-control"/>
                    </div>
                    <div class="col mb-0">
                        <label for="cadastro_sexo" class="form-label">Sexo:<span class="text-danger">*</span></label>
                        <select id="cadastro_sexo" class="form-select">
                            <option>Selecione...</option>
                            <option value="F">Feminino</option>
                            <option value="M">Masculino</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="cadastro_telefone" class="form-label">Celular:</label>
                        <input type="text" id="cadastro_telefone" class="form-control mask-celular"/>
                    </div>
                </div>
                <div class="row g-4 mb-4">
                    <div class="col-12">
                        <label for="cadastro_email" class="form-label">Email:</label>
                        <input type="email" id="cadastro_email" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Concluir</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-protocolo" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-header ps-6 pt-6">
                <h5 class="modal-title me-2" id="exampleModalLabel2">Novo Protocolo de Atendimento </h5>
                <p class="card-subtitle">Nome completo da pessoa aqui</p>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-4">
                        <label for="nameSmall" class="form-label">Protocolo:</label>
                        <input type="text" id="nameSmall" class="form-control mask-protocolo" value="0000000000" disabled/>
                    </div>
                    <div class="col mb-4">
                        <label for="nameSmall" class="form-label">Idioma:<span class="text-danger">*</span></label>
                        <select id="defaultSelect" class="form-select">
                            <option>Selecione...</option>
                            <option value="pt-BR">Português</option>
                            <option value="ja-JP">Japonês</option>
                            <option value="es-ES">Espanhol</option>
                            <option value="en-US">Inglês</option>
                            <option value="other">Outro</option>
                        </select>
                    </div>
                    <div class="col mb-4">
                        <label for="nameSmall" class="form-label">Província:</label>
                        <select id="defaultSelect" class="form-select">
                            <option>Selecione...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col mb-4">
                        <label for="nameSmall" class="form-label">Cidade:</label>
                        <select id="defaultSelect" class="form-select">
                            <option>Selecione...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col mb-4">
                        <label class="form-label" for="emailSmall">Email:<span class="text-warning">*</span></label>
                        <input type="email" class="form-control" id="emailSmall"/>
                    </div>
                    <div class="col-3 mb-4">
                        <label for="nameSmall" class="form-label">Celular:<span class="text-warning">*</span></label>
                        <input type="text" id="nameSmall" class="form-control mask-celular"/>
                    </div>
                    <div class="col-3 mb-4">
                        <label for="nameSmall" class="form-label">Telefone:<span class="text-warning">*</span></label>
                        <input type="text" id="nameSmall" class="form-control mask-telefone"/>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-3 mb-4">
                        <label class="form-label" for="emailSmall">Tipo:<span class="text-danger">*</span></label>
                        <select id="defaultSelect" class="form-select">
                            <option>Selecione...</option>
                            <option value="1">Dúvida</option>
                            <option value="2">Sugestão</option>
                            <option value="3">Reclamação</option>
                        </select>
                    </div>
                    <div class="col-3 mb-4">
                        <label class="form-label" for="emailSmall">Setor:<span class="text-danger">*</span></label>
                        <select id="defaultSelect" class="form-select">
                            <option>Selecione...</option>
                            <option value="1">Dúvida</option>
                            <option value="2">Sugestão</option>
                            <option value="3">Reclamação</option>
                        </select>
                    </div>
                    <div class="col mb-4">
                        <label for="nameSmall" class="form-label">Assunto:<span class="text-danger">*</span></label>
                        <input class="form-control" list="list_assuntos" id="exampleDataList" />
                        <datalist id="list_assuntos">
                            <option value="Assunto 1"></option>
                            <option value="Assunto 2"></option>
                        </datalist>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <label for="exampleFormControlTextarea1" class="form-label">Detalhes da demanda:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <label for="exampleFormControlTextarea1" class="form-label">Detalhes do tratamento:<span class="text-danger">*</span></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="7"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md mb-md-0 mb-5" title="Aguardando ação ou resposta da equipe">
                        <div class="form-check custom-option custom-option-icon">
                            <label class="form-check-label custom-option-content" for="protocolo_status_pendente">
                            <span class="custom-option-body">
                                <i class="icon-base ti tabler-urgent"></i>
                                <span class="custom-option-title"> Pendente </span>
                            </span>
                            <input name="customOptionRadioIcon" class="form-check-input" type="radio" value="" id="protocolo_status_pendente">
                            </label>
                        </div>
                    </div>
                    <div class="col-md mb-md-0 mb-5" title="Aguardando ação do interessado">
                        <div class="form-check custom-option custom-option-icon">
                            <label class="form-check-label custom-option-content" for="protocolo_status_aguardando">
                            <span class="custom-option-body">
                                <i class="icon-base ti tabler-hourglass-high"></i>
                                <span class="custom-option-title"> Aguardando </span>
                            </span>
                            <input name="customOptionRadioIcon" class="form-check-input" type="radio" value="" id="protocolo_status_aguardando">
                            </label>
                        </div>
                    </div>
                    <div class="col-md mb-md-0 mb-5" title="Finalizado e pronto para arquivamento">
                        <div class="form-check custom-option custom-option-icon">
                            <label class="form-check-label custom-option-content" for="protocolo_status_finalizado">
                            <span class="custom-option-body">
                                <i class="icon-base ti tabler-file-check"></i>
                                <span class="custom-option-title"> Finalizado </span>
                            </span>
                            <input name="customOptionRadioIcon" class="form-check-input" type="radio" value="" id="protocolo_status_finalizado">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <div>
                    <a href="#" target="_blank" class="btn btn-label-primary">Abrir Cadastro</a>
                </div>
                <div>
                    <button type="button" class="btn btn-label-secondary me-2" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Concluir</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
