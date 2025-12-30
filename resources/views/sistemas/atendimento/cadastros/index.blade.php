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
                <p class="mb-1">Este mês</p>
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
                <p class="mb-1">Este ano</p>
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
                        <input type="text" class="form-control" name="search_matricula">
                    </div>
                    <div class="col">
                        <label for="search_nascimento" class="form-label">Nascimento:</label>
                        <input type="date" class="form-control" max="{{ date('Y-m-d') }}" name="search_nascimento">
                    </div>
                </div>
            </div>
            <div class="card-body border-top mt-6">
                <table class="dt-route-vehicles table dataTable dtr-column">
                    <thead>
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
                                    <button class="btn btn-text-secondary rounded-pill waves-effect btn-icon" title="Adicionar Protocolo"><i class="icon-base ti tabler-phone-plus icon-22px"></i></button>
                                    <button class="btn btn-text-secondary rounded-pill waves-effect btn-icon" title="Adicionar Serviço"><i class="icon-base ti tabler-file-text-spark icon-22px"></i></button>
                                    <button class="btn btn-text-secondary rounded-pill waves-effect btn-icon" title="Unificar Cadastro"><i class="icon-base ti tabler-users-group icon-22px"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                    <tfoot></tfoot>
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
@endsection
