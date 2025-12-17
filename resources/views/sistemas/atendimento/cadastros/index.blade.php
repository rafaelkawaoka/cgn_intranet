@extends('layouts.app')

@section('content')
<div class="row">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="mb-1">Cadastros</h4>
            <p class="mb-0">Gerenciamento de matrícula consular</p>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-4">
            <button type="submit" class="btn btn-primary waves-effect waves-light">Novo cadastro</button>
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
                <p class="mb-0">
                    <span class="text-heading fw-medium me-2">+18.2%</span>
                    <small class="text-body-secondary">than last week</small>
                </p>
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
                <p class="mb-0">
                    <span class="text-heading fw-medium me-2">+18.2%</span>
                    <small class="text-body-secondary">than last week</small>
                </p>
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
                <p class="mb-0">
                    <span class="text-heading fw-medium me-2">+18.2%</span>
                    <small class="text-body-secondary">than last week</small>
                </p>
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
                <p class="mb-0">
                    <span class="text-heading fw-medium me-2">+18.2%</span>
                    <small class="text-body-secondary">than last week</small>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row mt-6">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Pesquisa de cadastros</h5>
                <div class="d-flex justify-content-between align-items-center row pt-8 gap-4 gap-md-0">
                    <div class="col-md-6">
                        <label for="search_name" class="form-label">Nome do consulente:</label>
                        <input type="text" class="form-control" name="search_name" id="search_name" placeholder="Nome do consulente">
                    </div>
                    <div class="col-md-2">
                        <label for="search_nascimento" class="form-label">Data de nascimento:</label>
                        <input type="date" class="form-control" name="search_nascimento">
                    </div>
                    <div class="col-md-2">
                        <label for="search_matricula" class="form-label">Número da matrícula:</label>
                        <input type="text" class="form-control" name="search_matricula">
                    </div>
                    <div class="d-grid gap-2 col-md-2 mx-auto">
                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light mt-6" id="btnNovo">Pesquisar</button>
                    </div>
                </div>
            </div>
            <div class="card-body border-top mt-6">
                <table class="dt-route-vehicles table dataTable dtr-column">
                    <thead>
                        <tr>
                            <th data-dt-column="2" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc dt-ordering-asc" aria-sort="ascending" aria-label="location: Activate to invert sorting" tabindex="0">
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
                                                <img src="../../assets/img/products/iphone.png" alt="User" class="rounded" width="46">
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
