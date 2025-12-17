@extends('layouts.app')

@section('content')
<div class="row">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="mb-1">Meus Saldos</h4>
            <p class="mb-0">Demontrativo de férias e banco de horas</p>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-4">
            <button type="submit" class="btn btn-primary waves-effect waves-light">Imprimir</button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card card-border-shadow-success h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-success"><i class="icon-base ti tabler-beach icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_a">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </h4>
                </div>
                <p class="mb-1">Férias disponíveis</p>
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
                        <span class="avatar-initial rounded bg-label-primary"><i class="icon-base ti tabler-beach icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_b">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </h4>
                </div>
                <p class="mb-1">Férias agendadas</p>
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
                        <span class="avatar-initial rounded bg-label-success"><i class="icon-base ti tabler-clock-hour-4 icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_c">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </h4>
                </div>
                <p class="mb-1">Horas disponíveis</p>
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
                        <span class="avatar-initial rounded bg-label-primary"><i class="icon-base ti tabler-clock-hour-4 icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_d">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </h4>
                </div>
                <p class="mb-1">Horas agendadas</p>
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
                        <h5 class="card-tile">Histórico de férias</h5>
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
                <div class="row">
                    <div class="col-md-12">
                        <div id="accordionCustomIcon" class="accordion mt-3 accordion-custom-button">
                            <div class="accordion-item">
                                <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionCustomIconOne">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionCustomIcon-1" aria-controls="accordionCustomIcon-1">
                                        <i class="icon-base ti tabler-calendar-week me-2"></i>
                                        Férias 2026 <span class="badge bg-label-primary ms-3">Previstas</span>
                                    </button>
                                </h2>

                                <div id="accordionCustomIcon-1" class="accordion-collapse collapse" data-bs-parent="#accordionCustomIcon">
                                    <div class="accordion-body">
                                        Lemon drops chocolate cake gummies carrot cake chupa chups muffin topping. Sesame snaps icing
                                        marzipan gummi bears macaroon dragée danish caramels powder. Bear claw dragée pastry topping
                                        soufflé.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionCustomIconTwo">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionCustomIcon-2" aria-controls="accordionCustomIcon-2">
                                        <i class="icon-base ti tabler-calendar-week me-2"></i>
                                        Férias 2025  <span class="badge bg-label-success ms-2">Disponíveis</span>
                                    </button>
                                </h2>
                                <div id="accordionCustomIcon-2" class="accordion-collapse collapse" data-bs-parent="#accordionCustomIcon">
                                    <div class="accordion-body">
                                        Dessert ice cream donut oat cake jelly-o pie sugar plum cheesecake. Bear claw dragée oat cake
                                        dragée ice cream halvah tootsie roll. Danish cake oat cake pie macaroon tart donut gummies.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionCustomIconThree">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionCustomIcon-3" aria-controls="accordionCustomIcon-3">
                                        <i class="icon-base ti tabler-calendar-week me-2"></i>
                                        Férias 2024 <span class="badge bg-label-secondary ms-2">Utilizadas</span>
                                    </button>
                                </h2>
                                <div id="accordionCustomIcon-3" class="accordion-collapse collapse" data-bs-parent="#accordionCustomIcon">
                                    <div class="accordion-body">
                                        Oat cake toffee chocolate bar jujubes. Marshmallow brownie lemon drops cheesecake. Bonbon
                                        gingerbread marshmallow sweet jelly beans muffin. Sweet roll bear claw candy canes oat cake
                                        dragée caramels.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionCustomIconThree">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionCustomIcon-4" aria-controls="accordionCustomIcon-4">
                                        <i class="icon-base ti tabler-calendar-week me-2"></i>
                                        Férias 2023 <span class="badge bg-label-secondary ms-2">Utilizadas</span>
                                    </button>
                                </h2>
                                <div id="accordionCustomIcon-4" class="accordion-collapse collapse" data-bs-parent="#accordionCustomIcon">
                                    <div class="accordion-body">
                                        Oat cake toffee chocolate bar jujubes. Marshmallow brownie lemon drops cheesecake. Bonbon
                                        gingerbread marshmallow sweet jelly beans muffin. Sweet roll bear claw candy canes oat cake
                                        dragée caramels.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionCustomIconThree">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionCustomIcon-5" aria-controls="accordionCustomIcon-5">
                                        <i class="icon-base ti tabler-calendar-week me-2"></i>
                                        Férias 2022 <span class="badge bg-label-danger ms-2">Vencidas</span>
                                    </button>
                                </h2>
                                <div id="accordionCustomIcon-5" class="accordion-collapse collapse" data-bs-parent="#accordionCustomIcon">
                                    <div class="accordion-body">
                                        Oat cake toffee chocolate bar jujubes. Marshmallow brownie lemon drops cheesecake. Bonbon
                                        gingerbread marshmallow sweet jelly beans muffin. Sweet roll bear claw candy canes oat cake
                                        dragée caramels.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
</div>
<div class="row mt-6">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row justify-content-between">
                    <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto mt-0">
                        <h5 class="card-tile">Histórico de banco de horas</h5>
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
                <div class="row">
                    <div class="col-md-12">
                        <div id="accordionCustomIcon" class="accordion mt-3 accordion-custom-button">
                            <div class="accordion-item">
                                <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionCustomIconOne">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionCustomIcon-1" aria-controls="accordionCustomIcon-1">
                                        <i class="icon-base ti tabler-calendar-week me-2"></i>
                                        Accordion Item 1
                                    </button>
                                </h2>
                                <div id="accordionCustomIcon-1" class="accordion-collapse collapse" data-bs-parent="#accordionCustomIcon">
                                    <div class="accordion-body">
                                        Lemon drops chocolate cake gummies carrot cake chupa chups muffin topping. Sesame snaps icing
                                        marzipan gummi bears macaroon dragée danish caramels powder. Bear claw dragée pastry topping
                                        soufflé.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item previous-active">
                                <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionCustomIconTwo">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionCustomIcon-2" aria-controls="accordionCustomIcon-2">
                                        <i class="icon-base ti tabler-calendar-week me-2"></i>
                                        Accordion Item 2
                                    </button>
                                </h2>
                                <div id="accordionCustomIcon-2" class="accordion-collapse collapse" data-bs-parent="#accordionCustomIcon">
                                    <div class="accordion-body">
                                        Dessert ice cream donut oat cake jelly-o pie sugar plum cheesecake. Bear claw dragée oat cake
                                        dragée ice cream halvah tootsie roll. Danish cake oat cake pie macaroon tart donut gummies.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item active">
                                <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionCustomIconThree">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionCustomIcon-3" aria-controls="accordionCustomIcon-3">
                                        <i class="icon-base ti tabler-calendar-week me-2"></i>
                                        Accordion Item 3
                                    </button>
                                </h2>
                                <div id="accordionCustomIcon-3" class="accordion-collapse collapse" data-bs-parent="#accordionCustomIcon">
                                    <div class="accordion-body">
                                        Oat cake toffee chocolate bar jujubes. Marshmallow brownie lemon drops cheesecake. Bonbon
                                        gingerbread marshmallow sweet jelly beans muffin. Sweet roll bear claw candy canes oat cake
                                        dragée caramels.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
</div>
@endsection
