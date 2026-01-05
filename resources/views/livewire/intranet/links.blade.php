<div>
    <div class="row">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1">Links Úteis</h4>
                <p class="mb-0">Gerenciamento de links da intranet</p>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-4">
                <button type="button" class="btn btn-primary waves-effect waves-light" wire:click="create" data-bs-toggle="modal" data-bs-target="#linkModal">
                    Nova publicação
                </button>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <th>Descrição</th>
                        <th>Link</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($links as $item)
                        <tr>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->description }}</td>
                            <td><a href="{{ $item->link }}" target="_blank">{{ $item->link }}</a></td>
                            <td>
                                <button class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect waves-light" wire:click="edit({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#linkModal">
                                    <i class="ti tabler-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-text-danger rounded-pill waves-effect waves-light" wire:confirm="Tem certeza que deseja excluir este link?" wire:click="delete({{ $item->id }})">
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
                                <input type="text" id="category" wire:model="category" class="form-control @error('category') is-invalid @enderror" placeholder="Ex: Geral">
                                @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="description" class="form-label">Descrição</label>
                                <input type="text" id="description" wire:model="description" class="form-control @error('description') is-invalid @enderror" placeholder="Ex: Portal RH">
                                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="link" class="form-label">Link</label>
                                <input type="url" id="link" wire:model="link" class="form-control @error('link') is-invalid @enderror" placeholder="https://...">
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
            const modalEl = document.getElementById('linkModal');

            // Clean up backdrop on manual close
            modalEl.addEventListener('hidden.bs.modal', event => {
                const backdrops = document.querySelectorAll('.modal-backdrop');
                backdrops.forEach(backdrop => {
                    backdrop.remove();
                });
                document.body.classList.remove('modal-open');
                document.body.style.overflow = '';
                document.body.style.paddingRight = '';
            });

            Livewire.on('close-modal', () => {
                const modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) {
                    modal.hide();
                }
            });

            Livewire.on('open-modal', () => {
                const modal = new bootstrap.Modal(modalEl);
                modal.show();
            });
        });
    </script>
</div>
