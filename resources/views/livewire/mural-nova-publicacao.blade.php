<div>
    <div class="btn-group">
        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modal-nova-publicacao">
            Nova publicação
        </button>
        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light"
                data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Menu suspenso</span>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item waves-effect" href="javascript:void(0);">Publicações ativas</a></li>
            <li><a class="dropdown-item waves-effect" href="javascript:void(0);">Publicações arquivadas</a></li>
        </ul>
    </div>

    <div class="modal fade" id="modal-nova-publicacao" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-6">
                        <h4 class="mb-2">Nova publicação</h4>
                        <p>Preencha as informações no formulário abaixo.</p>
                    </div>
                    <form class="row g-6" wire:submit.prevent="save">
                        <div class="col-4">
                            <label class="form-label" for="publicacao_tipo">Tipo de publicação:</label>
                            <select id="publicacao_tipo" class="form-select @error('tipo') is-invalid @enderror" wire:model.live="tipo">
                                <option value="1">Imediata</option>
                                <option value="2">Agendada</option>
                                <option value="3">Temporária</option>
                            </select>
                            @error('tipo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="publicacao_inicio">Publicar em:</label>
                            <input type="date" id="publicacao_inicio" class="form-control @error('data_inicio') is-invalid @enderror" wire:model.live="data_inicio" @disabled((int)$tipo === 1)>
                            @error('data_inicio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="publicacao_termino">Manter até:</label>
                            <input type="date" id="publicacao_termino" class="form-control @error('data_termino') is-invalid @enderror" wire:model.live="data_termino" @disabled((int)$tipo !== 3)>
                            @error('data_termino') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-8">
                            <label class="form-label" for="publicacao_titulo">Título da publicação:</label>
                            <input type="text" id="publicacao_titulo" class="form-control @error('titulo') is-invalid @enderror" wire:model.defer="titulo">
                            @error('titulo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="publicacao_modalidade">Modalidade:</label>
                            <select id="publicacao_modalidade" class="form-select @error('modalidade') is-invalid @enderror" wire:model.defer="modalidade">
                                <option value="1">Simples</option>
                                <option value="2">Enquete</option>
                            </select>
                            @error('modalidade') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="publicacao_conteudo">Texto da publicação:</label>
                            <textarea id="publicacao_conteudo" rows="5" class="form-control @error('conteudo') is-invalid @enderror" wire:model.defer="conteudo"></textarea>
                            @error('conteudo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="publicacao_anexos">Anexar Arquivos:</label>
                            <input class="form-control @error('anexos') is-invalid @enderror @error('anexos.*') is-invalid @enderror" type="file" id="publicacao_anexos" multiple wire:model="anexos">
                            @error('anexos')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            @error('anexos.*')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <div class="form-text mt-1">
                                @if (!empty($anexos))
                                    {{ count($anexos) }} arquivo(s) selecionado(s).
                                @else
                                    Você pode selecionar múltiplos arquivos.
                                @endif
                            </div>
                            <div wire:loading wire:target="anexos" class="mt-2">
                                Enviando arquivos...
                            </div>
                        </div>
                        <div class="col-8">
                            <label class="form-label" for="publicacao_link_url">Link Externo:</label>
                            <input type="text" id="publicacao_link_url" class="form-control @error('link_externo') is-invalid @enderror" wire:model.defer="link_externo">
                            @error('link_externo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="publicacao_link_title">Nome do Link:</label>
                            <input type="text" id="publicacao_link_title" class="form-control @error('link_title') is-invalid @enderror" wire:model.defer="link_title">
                            @error('link_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-3" wire:loading.attr="disabled">
                                Publicar
                            </button>
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                Cancelar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
