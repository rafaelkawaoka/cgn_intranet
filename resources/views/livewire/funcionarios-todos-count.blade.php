<div class="col-lg-3 col-sm-6" wire:init="load">
    <div class="card card-border-shadow-primary h-100">
        <div class="card-body">
            <div class="d-flex align-items-center mb-2">
                <div class="avatar me-4">
                    <a href="{{ route('sistemas.administracao.funcionarios', (['section' => 'todos'])) }}">
                        <span class="avatar-initial rounded bg-label-primary">
                            <i class="icon-base ti tabler-users icon-28px"></i>
                        </span>
                    </a>
                </div>
                <h4 class="mb-0">
                    @if ($total === null)
                        <div class="spinner-border spinner-border-sm text-secondary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    @else
                        {{ $total }}
                    @endif
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
