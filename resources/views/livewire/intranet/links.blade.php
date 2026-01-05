<div>
    <div class="row">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1">Links Úteis</h4>
                <p class="mb-0">Gerenciamento de links da intranet</p>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-4">
                <button type="button" class="btn btn-primary waves-effect waves-light" wire:click="create" data-bs-toggle="modal" data-bs-target="#linkModal">
                    Adicionar Link
                </button>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <div class="row justify-content-between">
                <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto mt-0">
                    <h5 class="card-tile">Repositório de Links</h5>
                </div>
                <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto mt-0">
                </div>
                </div>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr class="bg-label-secondary">
                        <th>Descrição</th>
                        <th>Link</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($links as $item)
                        <tr>
                            <td>{{ $item->description }}</td>
                            <td><a href="{{ $item->link }}" target="_blank">{{ $item->link }}</a></td>
                            <td>{{ $item->category }}</td>
                            <td>
                                <button class="btn btn-text-secondary rounded-pill btn-icon" wire:click="edit({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#linkModal">
                                    <i class="icon-base ti tabler-edit"></i>
                                </button>
                                <button class="btn btn-text-secondary rounded-pill btn-icon" wire:confirm="Tem certeza que deseja excluir este link?" wire:click="delete({{ $item->id }})">
                                    <i class="ti tabler-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Nenhum link encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="linkModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $isEditing ? 'Editar Link' : 'Novo Link' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="category" class="form-label">Categoria</label>
                                <input type="text" id="category" wire:model="category" class="form-control @error('category') is-invalid @enderror">
                                @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="description" class="form-label">Descrição</label>
                                <input type="text" id="description" wire:model="description" class="form-control @error('description') is-invalid @enderror">
                                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="link" class="form-label">Link</label>
                                <input type="url" id="link" wire:model="link" class="form-control @error('link') is-invalid @enderror">
                                @error('link') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('close-modal', () => {
                const modalEl = document.getElementById('linkModal');
                const modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) {
                    modal.hide();
                }
                const backdrops = document.querySelectorAll('.modal-backdrop');
                backdrops.forEach(backdrop => {
                    backdrop.remove();
                });
                document.body.classList.remove('modal-open');
                document.body.style.overflow = '';
                document.body.style.paddingRight = '';
            });
            Livewire.on('open-modal', () => {
                const modalEl = document.getElementById('linkModal');
                const modal = new bootstrap.Modal(modalEl);
                modal.show();
            });
        });
    </script>
</div>
