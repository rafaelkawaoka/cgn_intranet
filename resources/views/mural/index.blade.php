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
        <livewire:mural-posts>
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
@endsection
