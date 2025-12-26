@extends('layouts.app')

@section('headscripts')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.cs') }}s" />
@endsection

@section('content')
<div class="row">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="mb-1">
                <a href="{{ route('sistemas.atendimento.cadastros') }}" class="text-body">
                    <i class="icon-base ti tabler-speakerphone icon-22px mb-1"></i>
                </a>
                Mural de Avisos
            </h4>
            <p class="mb-0">Publicações ativas</p>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-4">
            <livewire:mural-nova-publicacao>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-9">
        <div class="card border rounded mb-6">
            <div class="card-header header-elements py-6">
                <h5 class="mb-0 me-2">Nunc feugiat congue accumsan. In ultrices odio vitae ligula rutrum.</h5>
                <div class="card-header-elements ms-auto">
                    <div class="d-flex justify-content-start align-items-center customer-name">
                        <div class="avatar-wrapper">
                            <div class="avatar avatar-sm me-4"><img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle"></div>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="fw-medium">Nome do Funcionário</span>
                            <small class="text-nowrap text-body-secondary">Sex, 22 dezembro 2025</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border py-8">
                <div class="row">
                    <div class="col-md-12">
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br><br>Duis hendrerit, nisi eget semper lacinia, augue orci porta augue, nec blandit erat nisi sit amet augue. Quisque mollis lorem ut convallis pretium. Integer suscipit libero metus, nec mollis orci sodales nec. Morbi enim nisl, egestas in diam pulvinar, viverra egestas metus. Suspendisse ipsum tellus, pulvinar at dignissim eu, tristique a lacus. Proin fermentum turpis vitae massa lacinia, id porttitor massa luctus. Nulla nec nunc et dolor convallis ultrices. Aliquam varius vehicula magna, non pretium dui pretium quis. Nullam et ultrices tortor. Nullam tincidunt finibus leo a volutpat.</p>
                    </div>
                </div>
                <div class="row mt-6">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-outline-secondary waves-effect me-1"><span class="icon-xs icon-base ti tabler-download me-2"></span>nome_de_um_arquivo_grande.pdf</button>
                        <button type="button" class="btn btn-outline-secondary waves-effect me-1"><span class="icon-xs icon-base ti tabler-download me-2"></span>nome_de_um_arquivo.jpg</button>
                        <button type="button" class="btn btn-outline-secondary waves-effect me-1"><span class="icon-xs icon-base ti tabler-external-link me-2"></span>Link externo</button>
                    </div>
                </div>
            </div>
            <div class="card-footer py-3">
                <div class="row d-flex justify-content-between">
                    <div class="col-md-6">
                        <a class="btn btn-icon btn-text-secondary waves-effect rounded border" href="javascript:void(0);" title="Afirmativo">
                            <i class="tabler-thumb-up icon-base ti icon-22px theme-icon-active text-heading"></i>
                        </a>
                        <a class="btn btn-icon btn-text-secondary waves-effect rounded border" href="javascript:void(0);" title="Negativo">
                            <i class="tabler-thumb-down icon-base ti icon-22px theme-icon-active text-heading"></i>
                        </a>
                        <a class="btn btn-icon btn-text-secondary waves-effect rounded border" href="javascript:void(0);" title="Resultados">
                            <i class="tabler-chart-pie-2 icon-base ti icon-22px theme-icon-active text-heading"></i>
                        </a>
                        <a class="btn btn-icon btn-text-secondary waves-effect rounded border" href="javascript:void(0);" title="Ciente">
                            <i class="tabler-circle-dashed-check icon-base ti icon-22px theme-icon-active text-heading"></i>
                        </a>
                        <a class="btn btn-icon btn-text-secondary waves-effect rounded border" href="javascript:void(0);" title="Comentários">
                            <i class="tabler-message icon-base ti icon-22px theme-icon-active text-heading"></i>
                        </a>
                        <small class="ps-2 text text-body-secondary">0 comentários</small>
                        <div class="modal fade" id="modal-comentarios" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div class="text-center mb-6">
                                            <h4 class="mb-2">Comentários</h4>
                                            <p>Comentários desta publicação</p>
                                        </div>
                                        <form id="addNewCCForm" class="row g-6" onsubmit="return false">
                                            <div class="col-12 form-control-validation">
                                                <label class="form-label w-100" for="modalAddCard">Card Number</label>
                                                <div class="input-group input-group-merge">
                                                    <input id="modalAddCard" name="modalAddCard" class="form-control credit-card-mask" type="text" placeholder="1356 3215 6548 7898" aria-describedby="modalAddCard2" />
                                                    <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span class="card-type"></span></span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="modalAddCardName">Name</label>
                                                <input type="text" id="modalAddCardName" class="form-control" placeholder="John Doe" />
                                            </div>
                                            <div class="col-6 col-md-3">
                                                <label class="form-label" for="modalAddCardExpiryDate">Exp. Date</label>
                                                <input type="text" id="modalAddCardExpiryDate" class="form-control expiry-date-mask" placeholder="MM/YY" />
                                            </div>
                                            <div class="col-6 col-md-3">
                                                <label class="form-label" for="modalAddCardCvv">CVV Code</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text" id="modalAddCardCvv" class="form-control cvv-code-mask pe-0" maxlength="3" placeholder="654" />
                                                    <span class="input-group-text cursor-pointer ps-0" id="modalAddCardCvv2"><i class="text-body-secondary icon-base ti tabler-help" data-bs-toggle="tooltip" data-bs-placement="top" title="Card Verification Value"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" id="futureAddress" />
                                                    <label for="futureAddress" class="switch-label">Save card for future billing?</label>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <button type="submit" class="btn btn-primary me-3">Submit</button>
                                                <button type="reset" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <a class="btn btn-icon btn-text-secondary waves-effect rounded border" href="javascript:void(0);" title="Editar">
                            <i class="tabler-edit icon-base ti icon-22px theme-icon-active text-heading"></i>
                        </a>
                        <a class="btn btn-icon btn-text-secondary waves-effect rounded border" href="javascript:void(0);" title="Excluir">
                            <i class="tabler-trash icon-base ti icon-22px theme-icon-active text-heading"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-6">
            <div class="card-header d-flex justify-content-between">
                <div class="card-title mb-0">
                    <h5 class="mb-1">Ausências</h5>
                    <p class="card-subtitle">19 de dezembro de 2025</p>
                </div>
            </div>
            <div class="card-body">
                <ul class="p-0 m-0">
                    @for ($i = 0; $i < 5; $i++)
                    <li class="d-flex align-items-center mb-4">
                        <div class="avatar flex-shrink-0 me-4">
                            <img src="{{ asset('assets/img/placeholders/user_placeholder.jpg') }}" alt="" class="w-px-40 h-auto rounded-circle border">
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between">
                            <div class="me-2">
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0 me-1">Nome do funcionário</h6>
                                </div>
                                <small class="text-body">Férias ordinárias</small>
                            </div>
                        </div>
                    </li>
                    @endfor
                </ul>
            </div>
      </div>
        <div class="card mb-6">
            <div class="card-header d-flex justify-content-between">
                <div class="card-title mb-0">
                    <h5 class="mb-1">Aniversariantes</h5>
                    <p class="card-subtitle">Próximos 30 dias</p>
                </div>
            </div>
            <div class="card-body">
                <ul class="p-0 m-0">
                    @for ($i = 0; $i < 5; $i++)
                    <li class="d-flex align-items-center mb-4">
                        <div class="avatar flex-shrink-0 me-4">
                            <img src="{{ asset('assets/img/placeholders/user_placeholder.jpg') }}" alt="" class="w-px-40 h-auto rounded-circle border">
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between">
                            <div class="me-2">
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0 me-1">Nome do funcionário</h6>
                                </div>
                                <small class="text-body">00 de dezembro</small>
                            </div>
                        </div>
                    </li>
                    @endfor
                </ul>
            </div>
      </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/vendor/libs/quill/quill.js') }}"></script>
<script>
  const toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],
  ];
  const quill = new Quill('#publicacao_conteudo', {
    theme: 'snow',
    modules: {
      toolbar: toolbarOptions
    }
  });
</script>
@endsection
