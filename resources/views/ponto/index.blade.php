@extends('layouts.app')

@section('content')
<div class="row">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="mb-1">Ponto Digital</h4>
            <p class="mb-0">Relatório de registro de ponto</p>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-4">
            <button type="submit" class="btn btn-primary waves-effect waves-light">Imprimir</button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row justify-content-between">
                    <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto mt-0">
                        <h5 class="card-tile">Dezembro de 2025</h5>
                    </div>
                    <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto mt-0">
                        <div class="dt-search">
                            <input type="month" class="form-control ms-0" id="dt-search-0" placeholder="Filtrar Resultados">
                            <label for="dt-search-0"></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered table-sm text-center">
                        <thead>
                            <tr class="text-center">
                                <th class="col-md-1">Dia</th>
                                <th class="col-md-2">Entrada</th>
                                <th class="col-md-2">Saída</th>
                                <th class="col-md-2">Carga</th>
                                <th class="col-md-2">Situação</th>
                                <th class="col-md-3">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @for ($i = 1; $i <= 31; $i++)
                        <tr class="text-center">
                            <td>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }} (SEG)</td>
                            <td>00:00</td>
                            <td>00:00</td>
                            <td>00:00</td>
                            <td>
                                <span class="badge bg-label-success">Completo</span>
                            </td>
                            <td>
                                <div class="d-inline-block text-nowrap">
                                    <button class="btn btn-text-secondary rounded-pill waves-effect btn-icon" title="Detalhamento do ponto"><i class="icon-base ti tabler-info-square-rounded icon-22px"></i></button>
                                    <button class="btn btn-text-secondary rounded-pill waves-effect btn-icon" title="Nova solicitação" data-bs-toggle="modal" data-bs-target="#modal-nova-solicitacao"><i class="icon-base ti tabler-arrow-autofit-right icon-22px"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer pb-0">
                <div class="row justify-content-between">
                    <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto mt-0">
                        <span class="text-body-secondary mb-5">Atualizado em: 00/00/0000 00:00</span>
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
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Feriados</h5>
                <ul class="p-0 m-0">
                    @for ($i = 0; $i < 10; $i++)
                    <li class="d-flex mb-3 pb-2 align-items-center">
                        <div class="badge bg-label-primary me-4 rounded p-1_5">
                            <i class="icon-base ti tabler-calendar-star icon-md"></i>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Natal</h6>
                                <small class="text-body d-block">クリスマス</small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0 text-primary">25 (SEG)</h6>
                            </div>
                        </div>
                    </li>
                    @endfor
                </ul>
            </div>
        </div>
        <div class="card mt-6">
            <div class="card-body border-top">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <span class="h6 mb-0">Dias trabalhados</span>
                    <span class="h6 mb-0">26 de 30</span>
                </div>
                <div class="progress mb-1 bg-label-primary" style="height: 6px;">
                    <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small>00%</small>
            </div>
            <div class="card-body border-top">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <span class="h6 mb-0">Horas trabalhadas</span>
                    <span class="h6 mb-0">26 de 30</span>
                </div>
                <div class="progress mb-1 bg-label-primary" style="height: 6px;">
                    <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small>00%</small>
            </div>
        </div>
    </div>
</div>
@include('solicitacoes.components.modal-nova-solicitacao', (['date' => true]))
@endsection
