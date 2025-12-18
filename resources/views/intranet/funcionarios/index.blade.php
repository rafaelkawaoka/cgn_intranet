@extends('layouts.app')

@section('content')
<div class="row">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="mb-1">
                <a href="{{ route('sistemas.administracao.funcionarios') }}" class="text-body">
                    <i class="icon-base ti tabler-users icon-22px mb-1"></i>
                </a>
                Funcionários
            </h4>
            <p class="mb-0">{{ env('APP_POSTO') }}</p>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-4">
            <button type="submit" class="btn btn-primary waves-effect waves-light">Imprimir</button>
        </div>
    </div>
</div>
<div class="row">
    @for ($i = 0; $i < 42; $i++)
    <div class="col-md-3 mb-6">
        <div class="card border rounded pb-10">
            <div class="user-avatar-section mt-10 pb-5">
                <div class=" d-flex align-items-center flex-column">
                    <img class="img-fluid rounded border mb-4" src="{{ asset('assets/img/placeholders/user_placeholder.jpg') }}" height="250" width="250" alt="User avatar">
                    <div class="user-info text-center">
                        <h5 class="mb-0">Nome do Funcionário</h5>
                        <span class="text-body">Cargo do Funcionário</span>
                    </div>
                    <span class="badge bg-label-dark mt-3">Nome do Setor</span>
                </div>
            </div>
            <div class="card shadow-none border rounded mx-4 pb-2 bg-label-secondary text-center">
                <span class="mb-1 mt-2" title="Ramal"><i class="icon-base ti tabler-phone-call mr-2"></i> 00</span>
                <span class="mb-1" title="Admissão"><i class="icon-base ti tabler-calendar-week mr-2"></i> 00/00/0000</span>
                <span class="mb-1" title="Email"><i class="icon-base ti tabler-mail mr-2"></i> nome.sobrenome</span>
            </div>
        </div>
    </div>
    @endfor
</div>
@endsection
