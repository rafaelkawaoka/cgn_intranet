@extends('layouts.app')

@section('content')
<div class="row">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="mb-1">Matrícula Consular</h4>
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
                        <span class="avatar-initial rounded bg-label-success"><i class="icon-base ti tabler-calendar-plus icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_a">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </h4>
                </div>
                <p class="mb-1">Cadastro</p>
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
                        <span class="avatar-initial rounded bg-label-danger"><i class="icon-base ti tabler-calendar-repeat icon-28px"></i></span>
                    </div>
                    <h4 class="mb-0">
                        <span id="stats_b">
                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                    </h4>
                </div>
                <p class="mb-1">Atualização</p>
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
                <p class="mb-0">
                    <span class="text-heading fw-medium me-2">+18.2%</span>
                    <small class="text-body-secondary">than last week</small>
                </p>
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
                <p class="mb-0">
                    <span class="text-heading fw-medium me-2">+18.2%</span>
                    <small class="text-body-secondary">than last week</small>
                </p>
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
                        <div class="row mb-6">
                            <div class="col-md-9">
                                <label class="form-label" for="basic-default-fullname">Nome Completo:</label>
                                <input type="text" class="form-control" id="" name="" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="basic-default-fullname">Matrícula:</label>
                                <input type="text" class="form-control" id="" name="" value="" disabled>
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
                                <select class="form-select" id="" name="">
                                    <option selected="">Selecione...</option>
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
                                <select class="form-select" id="" name="">
                                    <option selected="">Selecione...</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="basic-default-fullname">Estado/Província:</label>
                                <select class="form-select" id="" name="">
                                    <option selected="">Selecione...</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="basic-default-fullname">Cidade:</label>
                                <select class="form-select" id="" name="">
                                    <option selected="">Selecione...</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-9">
                            <div class="col-md-9">
                                <label class="form-label" for="basic-default-fullname">Nacionalidades:</label>
                                <input type="text" class="form-control" id="" name="" value="">
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
                        <div class="row mb-6">
                            <div class="col-md-12">
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th>Nome Completo</th>
                                                <th class="col-md-2 text-center">Nascimento</th>
                                                <th class="col-md-2 text-center">Matrícula</th>
                                                <th class="col-md-2 text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span class="fw-medium">Nome do Cadastro</span>
                                                </td>
                                                <td class="text-center">
                                                    00/00/0000
                                                </td>
                                                <td class="text-center">
                                                    JPN123456789
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-text-primary rounded-pill waves-effect btn-icon" title="Ver cadastro"><i class="icon-base ti tabler-id icon-22px"></i></button>
                                                    <button class="btn btn-text-primary rounded-pill waves-effect btn-icon" title="Desvincular"><i class="icon-base ti tabler-unlink icon-22px"></i></button>
                                                </td>
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
                        <div class="row mb-9">
                            <div class="col-md-12">
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th>Nome Completo</th>
                                                <th class="col-md-2 text-center">Nascimento</th>
                                                <th class="col-md-2 text-center">Matrícula</th>
                                                <th class="col-md-2 text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span class="fw-medium">Nome do Cadastro</span>
                                                </td>
                                                <td class="text-center">
                                                    00/00/0000
                                                </td>
                                                <td class="text-center">
                                                    JPN123456789
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-text-primary rounded-pill waves-effect btn-icon" title="Ver cadastro"><i class="icon-base ti tabler-id icon-22px"></i></button>
                                                    <button class="btn btn-text-primary rounded-pill waves-effect btn-icon" title="Desvincular"><i class="icon-base ti tabler-unlink icon-22px"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fw-medium">Nome do Cadastro</span>
                                                </td>
                                                <td class="text-center">
                                                    00/00/0000
                                                </td>
                                                <td class="text-center">
                                                    JPN123456789
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-text-primary rounded-pill waves-effect btn-icon" title="Ver cadastro"><i class="icon-base ti tabler-id icon-22px"></i></button>
                                                    <button class="btn btn-text-primary rounded-pill waves-effect btn-icon" title="Desvincular"><i class="icon-base ti tabler-unlink icon-22px"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fw-medium">Nome do Cadastro</span>
                                                </td>
                                                <td class="text-center">
                                                    00/00/0000
                                                </td>
                                                <td class="text-center">
                                                    JPN123456789
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-text-primary rounded-pill waves-effect btn-icon" title="Ver cadastro"><i class="icon-base ti tabler-id icon-22px"></i></button>
                                                    <button class="btn btn-text-primary rounded-pill waves-effect btn-icon" title="Desvincular"><i class="icon-base ti tabler-unlink icon-22px"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fw-medium">Nome do Cadastro</span>
                                                </td>
                                                <td class="text-center">
                                                    00/00/0000
                                                </td>
                                                <td class="text-center">
                                                    JPN123456789
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-text-primary rounded-pill waves-effect btn-icon" title="Ver cadastro"><i class="icon-base ti tabler-id icon-22px"></i></button>
                                                    <button class="btn btn-text-primary rounded-pill waves-effect btn-icon" title="Desvincular"><i class="icon-base ti tabler-unlink icon-22px"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-documentos" role="tabpanel">
                        <h5>Documentos</h5>
                        <p>Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice cream. Gummies halvah tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream cheesecake fruitcake.</p>
                        <p class="mb-0">Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah cotton candy liquorice caramels.</p>
                    </div>
                    <div class="tab-pane fade" id="tab-contatos" role="tabpanel">
                        <h5>Contatos</h5>
                        <p>Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies cupcake gummi bears cake chocolate.</p>
                        <p class="mb-0">Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly jelly-o tart brownie jelly.</p>
                    </div>
                    <div class="tab-pane fade" id="tab-enderecos" role="tabpanel">
                        <h5>Endereços</h5>
                        <p>Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies cupcake gummi bears cake chocolate.</p>
                        <p class="mb-0">Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly jelly-o tart brownie jelly.</p>
                    </div>
                    <div class="tab-pane fade" id="tab-servicos" role="tabpanel">
                        <h5>Serviços</h5>
                        <div class="accordion accordion-custom-button mt-3" id="accordionCustom">
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
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingCustomTwo">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionCustomTwo" aria-expanded="false" aria-controls="accordionCustomTwo">
                                    Accordion Item 2
                                    </button>
                                </h2>
                                <div id="accordionCustomTwo" class="accordion-collapse collapse" aria-labelledby="headingCustomTwo" data-bs-parent="#accordionCustom">
                                    <div class="accordion-body">
                                    Dessert ice cream donut oat cake jelly-o pie sugar plum cheesecake. Bear claw dragée oat cake
                                    dragée ice cream halvah tootsie roll. Danish cake oat cake pie macaroon tart donut gummies.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingCustomThree">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionCustomThree" aria-expanded="false" aria-controls="accordionCustomThree">
                                    Accordion Item 3
                                    </button>
                                </h2>
                                <div id="accordionCustomThree" class="accordion-collapse collapse" aria-labelledby="headingCustomThree" data-bs-parent="#accordionCustom">
                                    <div class="accordion-body">
                                    Oat cake toffee chocolate bar jujubes. Marshmallow brownie lemon drops cheesecake. Bonbon
                                    gingerbread marshmallow sweet jelly beans muffin. Sweet roll bear claw candy canes oat cake
                                    dragée caramels.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-saldos" role="tabpanel">
                        <h5>Saldo: JPY 000.000</h5>
                        <div class="table-responsive text-nowrap border rounded">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Movimentação</th>
                                        <th class="text-center">Data</th>
                                        <th class="text-center">Funcionário</th>
                                        <th class="text-end">Valor</th>
                                        <th class="text-end">Saldo</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0 table-border-top-0">
                                    <tr>
                                        <td>
                                            <span class="fw-medium">Depósito Bancário</span>
                                        </td>
                                        <td class="text-center">
                                            00/00/0000
                                        </td>
                                        <td class="text-center">
                                            Nome do Funcionário
                                        </td>
                                        <td class="text-end">
                                            <span class="text-success">000.000 C</span>
                                        </td>
                                        <td class="text-end">
                                            000.000 C
                                        </td>
                                    </tr>
                                    @for ($i = 0; $i < 25; $i++)
                                    <tr>
                                        <td>
                                            <span class="fw-medium">Nome ou descrição do emolumento</span>
                                        </td>
                                        <td class="text-center">
                                            00/00/0000
                                        </td>
                                        <td class="text-center">
                                            Nome do Funcionário
                                        </td>
                                        <td class="text-end">
                                            <span class="text-danger">00.000 D</span>
                                        </td>
                                        <td class="text-end">
                                            000.000 C
                                        </td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-anotacoes" role="tabpanel">
                        <h5>Anotações</h5>
                        <p>Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies cupcake gummi bears cake chocolate.</p>
                        <p class="mb-0">Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly jelly-o tart brownie jelly.</p>
                    </div>
                </div>
                <div class="d-flex justify-content-between pt-6">
                    <div class="">
                        <button type="reset" class="btn btn-label-primary waves-effect">Imprimir</button>
                        <button type="reset" class="btn btn-label-primary waves-effect ms-2">Anotação</button>
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
                        <img class="img-fluid rounded mb-4" src="{{ asset('assets/img/avatars/1.png') }}" height="250" width="250" alt="User avatar">
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
