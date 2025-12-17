<div>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Funcionário</th>
                        <th class="col-md-2">Setor</th>
                        <th class="col-md-2">Usuário</th>
                        <th class="col-md-1">Status</th>
                        <th class="col-md-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($funcionarios))
                    @foreach ($funcionarios as $funcionario)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar-wrapper me-3 rounded-2 bg-label-secondary">
                                    <a href="{{ route('sistemas.administracao.funcionarios.funcionario', (['id' => $funcionario->id])) }}">
                                        <div class="avatar">
                                            <img src="../../assets/img/ecommerce-images/product-16.png" alt="Product-8" class="rounded">
                                        </div>
                                    </a>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <a href="{{ route('sistemas.administracao.funcionarios.funcionario', (['id' => $funcionario->id])) }}" class="text-heading text-wrap fw-medium">{{ $funcionario->name }} (00) M</a>
                                    <span class="text-truncate mb-0 d-none d-sm-block"><small>Auxiliar Administrativo</small></span>
                                </div>
                            </div>
                        </td>
                        <td>
                            Nome do setor
                        </td>
                        <td>
                            {{ $funcionario->username }}
                        </td>
                        <td>
                            @if ($funcionario->is_active)
                                <span class="badge bg-label-success me-1">Ativo</span>
                            @else
                                <span class="badge bg-label-danger me-1">Inativo</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="icon-base ti tabler-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item waves-effect" href="javascript:void(0);"><i class="icon-base ti tabler-user-square-rounded me-1"></i> Matrícula</a>
                                    <a class="dropdown-item waves-effect" href="javascript:void(0);"><i class="icon-base ti tabler-user-up me-1"></i> Readmissão</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td class="text-center" colspan="5">Nenhum registro encontrado</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer pb-0">
        @if ($funcionarios->hasPages())
            {{ $funcionarios->links('vendor.pagination.custom') }}
        @else
        <div class="row justify-content-between">
            <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto mt-0">
                <span class="text-body-secondary mb-5">
                    {{ count($funcionarios) }} registros encontrados.
                </span>
            </div>
        </div>
        @endif
    </div>
</div>
