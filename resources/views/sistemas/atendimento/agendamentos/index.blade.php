@extends('layouts.app')

@section('content')
<div class="row">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="mb-1">
                <a href="{{ route('sistemas.atendimento.agendamentos') }}" class="text-body">
                    <i class="icon-base ti tabler-calendar-week icon-22px mb-1"></i>
                </a>
                Agendamentos
            </h4>
            <p class="mb-0">Agendamentos com check-in realizado</p>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-4">
            <div class="d-flex gap-4">
                <button class="btn btn-label-primary waves-effect">Imprimir lista</button>
            </div>
            <button type="submit" class="btn btn-primary waves-effect waves-light">Novo check-in</button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card card-border-shadow-warning h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-warning"><i class="icon-base ti tabler-user-pin icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_a">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </h4>
                </div>
                <p class="mb-1">Aguardando</p>
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
                        <span class="avatar-initial rounded bg-label-danger"><i class="icon-base ti tabler-user-pause icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_b">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </h4>
                </div>
                <p class="mb-1">Em espera</p>
                <p class="mb-0">
                    <span class="text-heading fw-medium me-2">+18.2%</span>
                    <small class="text-body-secondary">than last week</small>
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card card-border-shadow-success h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-success"><i class="icon-base ti tabler-user-check icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_c">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </h4>
                </div>
                <p class="mb-1">Atendidos</p>
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
                <p class="mb-1">Todos</p>
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
            <div class="card-header pb-0">
                <div class="row justify-content-between">
                    <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto mt-0">
                        <h5 class="card-tile">Agendamentos aguardando</h5>
                    </div>
                    <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto mt-0">
                        <div class="dt-search">
                            <input type="search" class="form-control ms-0" id="dt-search-0" placeholder="Filtrar Resultados">
                            <label for="dt-search-0"></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead class="table-secondary">
                            <tr>
                                <th>Nome do Interessado</th>
                                <th class="text-center">Data e hora</th>
                                <th class="text-center">Serviços</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span class="fw-medium">Angular Project</span>
                                </td>
                                <td class="text-center col-2">
                                    00/00/0000 00:00:00
                                </td>
                                <td class="text-center">
                                    0
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-label-warning me-1">Aguardando</span>
                                </td>
                                <td class="text-center">
                                    <a class="dropdown-item waves-effect" href="javascript:void(0);"><i class="icon-base ti tabler-pencil me-1"></i> Edit</a>
                                    <a class="dropdown-item waves-effect" href="javascript:void(0);"><i class="icon-base ti tabler-trash me-1"></i> Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
