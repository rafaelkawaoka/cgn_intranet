@extends('layouts.app')

@section('content')
<div class="row">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="mb-1">Solicitações</h4>
            <p class="mb-0">Sistema interno de solicitações eletrônicas</p>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-4">
            <button type="submit" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modal-nova-solicitacao">Nova solicitação</button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card card-border-shadow-warning h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-warning"><i class="icon-base ti tabler-hourglass-high icon-28px"></i></span>
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
        <div class="card card-border-shadow-success h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-success"><i class="icon-base ti tabler-thumb-up icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_b">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </h4>
                </div>
                <p class="mb-1">Deferidas</p>
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
                        <span class="avatar-initial rounded bg-label-danger"><i class="icon-base ti tabler-thumb-down icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_c">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </h4>
                </div>
                <p class="mb-1">Indeferidas</p>
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
                        <span class="avatar-initial rounded bg-label-primary"><i class="icon-base ti tabler-list icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_d">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </h4>
                </div>
                <p class="mb-1">Todas</p>
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
                        <h5 class="card-tile">Histórico de solicitações</h5>
                    </div>
                    <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto mt-0">
                        <div class="dt-search">
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                <option selected="">Todas as solicitações</option>
                                <option value="1">Correção de ponto</option>
                                <option value="2">Utilização de horas</option>
                                <option value="3">Indicação de ausência</option>
                                <option value="4">Trabalho extraordnário</option>
                                <option value="5">Atividade complementar</option>
                                <option value="6">Trabalho remoto</option>
                                <option value="7">Agendamento de férias</option>
                                <option value="8">Atestado de trabalho</option>
                            </select>
                            <label for="exampleFormControlSelect1"></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered table-sm text-center">
                            <thead>
                                <tr>
                                    <th>Protocolo</th>
                                    <th>Tipo de Solicitação</th>
                                    <th>Data Ref.</th>
                                    <th>Status</th>
                                    <th>Data Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody class="border-top">
                                @for ($i = 0; $i < 25; $i++)
                                <tr>
                                    <td>
                                        <span class="fw-medium">#202512366</span>
                                    </td>
                                    <td>Agendamento de férias (2025)</td>
                                    <td>
                                        00/00/0000
                                    </td>
                                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    <td>
                                        00/00/0000 00:00
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="icon-base ti tabler-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item waves-effect" href="javascript:void(0);"><i class="icon-base ti tabler-pencil me-1"></i> Editar</a>
                                                <a class="dropdown-item waves-effect" href="javascript:void(0);"><i class="icon-base ti tabler-paperclip me-1"></i> Anexar</a>
                                                <a class="dropdown-item waves-effect" href="javascript:void(0);"><i class="icon-base ti tabler-trash me-1"></i> Cancelar</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer pb-0">
                <div class="row justify-content-between">
                    <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto mt-0">
                        <span class="text-body-secondary mb-5">Exibindo de 1 até 25 de 250</span>
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
@include('solicitacoes.components.modal-nova-solicitacao', (['date' => false]))
@endsection
