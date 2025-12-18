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
            <p class="mb-0">Gerenciamento de recursos humanos</p>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-4">
            <div class="d-flex gap-4">
                <button class="btn btn-label-primary waves-effect">Imprimir lista</button>
            </div>
            <button type="submit" class="btn btn-primary waves-effect waves-light">Novo cadastro</button>
        </div>
    </div>
</div>
<div class="row">
    @livewire('funcionarios-ativos-count')
    @livewire('funcionarios-inativos-count')
    @livewire('funcionarios-ausentes-count')
    @livewire('funcionarios-todos-count')
</div>
<div class="row mt-6">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row justify-content-between">
                    <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto mt-0">
                        @switch($section)
                            @case('inativos')
                            <h5 class="card-tile">Funcionários Inativos</h5>
                                @break
                            @case('ausentes')
                            <h5 class="card-tile">Funcionários Ausentes</h5>
                                @break
                            @case('todos')
                            <h5 class="card-tile">Todos os funcionários</h5>
                                @break
                            @default
                            <h5 class="card-tile">Funcionários Ativos</h5>
                        @endswitch
                    </div>
                    <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto mt-0">
                        @livewire('funcionarios-filter')
                    </div>
                </div>
            </div>
            @livewire('funcionarios-table')
        </div>
    </div>
</div>
@endsection
