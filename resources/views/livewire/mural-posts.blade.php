<div>
    @foreach ($posts as $post)
        @php
            $uid = (int) (auth()->user()->funcionario_id ?? auth()->id());
            $isEnquete = (string)$post->modalidade === '2';
            $isSimples = (string)$post->modalidade === '1';
            $yes = $post->users_vote_yes ?? [];
            $no  = $post->users_vote_no ?? [];
            $cientes = $post->users_cientes ?? [];
            $votedYes = in_array($uid, $yes, true);
            $votedNo  = in_array($uid, $no, true);
            $hasVoted = $votedYes || $votedNo;
            $isCiente = in_array($uid, $cientes, true);
            $isOwnerPost = (int)$post->funcionario_id === $uid;
            $created = optional($post->created_at)->format('d/m/Y H:i');
        @endphp
        <div class="card border rounded mb-6">
            <div class="card-header header-elements py-6">
                <h5 class="mb-0 me-2">{{ $post->titulo }}</h5>
                 @if ($isEnquete)
                    @if ($post->enquete_end)
                        <span class="badge bg-label-danger">Votação Encerrada</span>
                    @else
                        <span class="badge bg-label-success">Enquete</span>
                    @endif
                @endif
                <div class="card-header-elements ms-auto">
                    <div class="d-flex justify-content-start align-items-center customer-name">
                        <div class="avatar-wrapper">
                            <div class="avatar avatar-sm me-4">
                                <span class="avatar-initial rounded-circle bg-label-secondary">US</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="fw-medium">{{ $post->funcionario->name ?? 'Funcionário' }}</span>
                            <small class="text-nowrap text-body-secondary">{{ $created }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border pt-8">
                <div class="row">
                    <div class="col-12">
                        {!! nl2br(e($post->conteudo)) !!}
                    </div>
                    @if ($post->edited_at)
                    <figcaption class="blockquote-footer mt-6 mb-0 pb-0">
                        <cite title="Data da edição">Editado em: {{ $post->edited_at->format('d/m/Y H:i') }}h</cite>
                    </figcaption>
                    @endif
                </div>
                <div class="row mt-6">
                    <div class="col-12">
                        @foreach ($post->attachments as $att)
                            <a class="btn btn-label-secondary waves-effect me-1 mb-3" href="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($att->file_url) }}" target="_blank">
                                <span class="icon-xs icon-base ti tabler-download me-2"></span>
                                {{ basename($att->file_name) }}
                            </a>
                        @endforeach
                        @if (!empty($post->link_externo))
                            <a class="btn btn-label-secondary waves-effect me-1" href="{{ $post->link_externo }}" target="_blank" title="Abrir em uma nova guia">
                                <span class="icon-xs icon-base ti tabler-external-link me-2"></span>
                                {{ $post->link_title ?: 'Link externo' }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer py-3">
                <div class="row d-flex justify-content-between">
                    <div class="col-md-6">
                        @if ($isEnquete)
                            @php
                            $ended = (bool) $post->enquete_end;
                            @endphp
                            @if (!($ended && !$hasVoted))
                                <button class="btn btn-icon waves-effect rounded border {{ $votedYes ? 'btn-success' : 'btn-text-secondary' }}"
                                        title="Afirmativo"
                                        wire:click="voteYes({{ $post->id }})"
                                        @disabled($hasVoted || $ended)>
                                    <i class="tabler-thumb-up icon-base ti icon-22px theme-icon-active text-heading"></i>
                                </button>
                                <button class="btn btn-icon waves-effect rounded border {{ $votedNo ? 'btn-danger' : 'btn-text-secondary' }}"
                                        title="Negativo"
                                        wire:click="voteNo({{ $post->id }})"
                                        @disabled($hasVoted || $ended)>
                                    <i class="tabler-thumb-down icon-base ti icon-22px theme-icon-active text-heading"></i>
                                </button>
                            @endif
                            @if ($hasVoted || $ended)
                                <button class="btn btn-icon btn-text-secondary waves-effect rounded border"
                                        title="Resultados"
                                        wire:click="openResults({{ $post->id }})">
                                    <i class="tabler-chart-pie-2 icon-base ti icon-22px theme-icon-active text-heading"></i>
                                </button>
                            @endif
                        @endif

                        @if ($isSimples)
                            @if (!$isCiente)
                                <button class="btn btn-icon btn-text-secondary waves-effect rounded border" title="Ciente" wire:click="markCiente({{ $post->id }})">
                                    <i class="tabler-circle-dashed-check icon-base ti icon-22px theme-icon-active text-heading"></i>
                                </button>
                            @else
                                <button class="btn btn-icon btn-text-secondary waves-effect rounded border" title="Cientes" wire:click="openCientes({{ $post->id }})">
                                    <i class="tabler-circle-check icon-base ti icon-22px theme-icon-active text-heading"></i>
                                </button>
                            @endif
                        @endif
                        <button class="btn btn-icon btn-text-secondary waves-effect rounded border" title="Comentários" wire:click="openComments({{ $post->id }})">
                            <i class="tabler-message icon-base ti icon-22px theme-icon-active text-heading"></i>
                        </button>
                        <small class="ps-2 text text-body-secondary">
                            {{ $post->comments()->count() }} comentários
                        </small>
                    </div>
                    <div class="col-md-6 text-end">
                        @if ($isOwnerPost)
                            @if ($isEnquete && !$post->enquete_end)
                            <button class="btn btn-icon btn-text-secondary waves-effect rounded border"
                                    title="Encerrar enquete"
                                    wire:click="endPoll({{ $post->id }})">
                                <i class="tabler-flag-off icon-base ti icon-22px theme-icon-active text-heading"></i>
                            </button>
                            @endif
                            <button class="btn btn-icon btn-text-secondary waves-effect rounded border" title="Editar" wire:click="openEdit({{ $post->id }})">
                                <i class="tabler-edit icon-base ti icon-22px theme-icon-active text-heading"></i>
                            </button>
                            <button class="btn btn-icon btn-text-secondary waves-effect rounded border" title="Excluir" wire:click="deletePost({{ $post->id }})">
                                <i class="tabler-trash icon-base ti icon-22px theme-icon-active text-heading"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="mt-4">
        {{ $posts->links("livewire::bootstrap") }}
    </div>

    <div class="modal fade" id="modal-comentarios" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-simple">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-6">
                        <h4 class="mb-2">Comentários</h4>
                        <p>Comente esta publicação</p>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <textarea class="form-control @error('commentText') is-invalid @enderror" rows="5" wire:model.defer="commentText"></textarea>
                            @error('commentText') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12 d-flex mt-3">
                            <button type="button" class="btn btn-label-primary ms-auto" wire:click="addComment">
                                Enviar
                            </button>
                        </div>
                    </div>
                    <hr>
                    <p class="my-6">Comentários ({{ $comments->count() }})</p>
                    @if ($comments->count() === 0)
                        <div class="card border shadow-none mb-3 text-center">
                            <p class="my-9">Não há comentários nesta publicação.</p>
                        </div>
                    @else
                        @foreach ($comments as $c)
                            @php
                                $isOwnerComment = (int)$c->funcionario_id === (int)($uid ?? 0);
                            @endphp
                            <div class="card border shadow-none mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-3">
                                            <span class="avatar-initial rounded-circle bg-label-secondary">US</span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="fw-medium">{{ $c->funcionario->name ?? 'Funcionário' }}</span>
                                            <small class="text-body-secondary">{{ optional($c->created_at)->format('d/m/Y H:i') }}</small>
                                        </div>
                                        @if ($isOwnerComment)
                                            <button class="btn btn-icon btn-text-secondary rounded border ms-auto" title="Excluir comentário" wire:click="deleteComment({{ $c->id }})">
                                                <i class="tabler-trash icon-base ti icon-22px theme-icon-active text-heading"></i>
                                            </button>
                                        @endif
                                    </div>
                                    <hr>
                                    <div>{!! nl2br(e($c->comentario)) !!}</div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="text-center mt-6 mb-0">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            Fechar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-resultados" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-simple">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-6">
                        <h4 class="mb-2">Resultados</h4>
                        <p>{{ $selectedPost && $selectedPost->enquete_end ? 'Resultado final da votação:' : 'Resultado parcial da votação:' }}</p>
                    </div>
                    @if ($selectedPost)
                        @php
                            $yesCount = count($selectedPost->users_vote_yes ?? []);
                            $noCount  = count($selectedPost->users_vote_no ?? []);
                            $total    = $yesCount + $noCount;
                            if ($total === 0) {
                                $pYes = 0;
                                $pNo  = 0;
                            } else {
                                $pYes = round(($yesCount / $total) * 100);
                                $pNo  = 100 - $pYes;
                            }
                        @endphp
                        <table class="table table-bordered">
                            <tbody>
                                <tr style="height: 80px">
                                    <td colspan="2">
                                        @if ($total === 0)
                                        <div class="alert alert-secondary text-center mt-3">
                                            Não foram registrados votos nesta enquete.
                                        </div>
                                        @else
                                        <div class="progress" style="height: 16px;">
                                            <div class="progress-bar bg-success" style="width: {{ $pYes }}%">
                                                {{ $pYes }}%
                                            </div>
                                            <div class="progress-bar bg-danger" style="width: {{ $pNo }}%">
                                                {{ $pNo }}%
                                            </div>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2"><span class="fw-medium">Sim ({{ count($yes) }})</span></td>
                                    <td>
                                        <ul class="list-unstyled m-0 d-flex align-items-center avatar-group my-4">
                                            @forelse ($voteYesUsers as $u)
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" title="{{ $u->name }}">
                                                <span class="avatar-initial rounded-circle bg-label-secondary">US</span>
                                            </li>
                                            @empty
                                            <li class="text-body-secondary">Nenhum voto.</li>
                                            @endforelse
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-2"><span class="fw-medium">Não ({{ count($no) }})</span></td>
                                    <td>
                                        <ul class="list-unstyled m-0 d-flex align-items-center avatar-group my-4">
                                            @forelse ($voteNoUsers as $u)
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" title="{{ $u->name }}">
                                                    <span class="avatar-initial rounded-circle bg-label-secondary">US</span>
                                                </li>
                                            @empty
                                                <li class="text-body-secondary">Nenhum voto.</li>
                                            @endforelse
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                    <div class="text-center mt-6">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-cientes" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-simple" style="width: 500px">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-6">
                        <h4 class="mb-2">Cientes</h4>
                        <p>Declararam ciência desta postagem:</p>
                    </div>
                    @if ($selectedPost)
                        @php $cientes = $selectedPost->users_cientes ?? []; @endphp
                        <table class="table table-bordered">
                            <tbody>
                                @forelse ($cienteUsers as $u)
                                    <tr>
                                        <td class="text-center">{{ $u->name }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-body-secondary">
                                            Nenhum ciente registrado.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    @endif
                    <div class="text-center mt-6">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-editar-post" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-simple">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-6">
                        <h4 class="mb-2">Editar Publicação</h4>
                        <p>Faça as retificações nos campos abaixo:</p>
                    </div>
                    <form class="row g-6" wire:submit.prevent="saveEdit">
                        <div class="col-12">
                            <label class="form-label">Título</label>
                            <input type="text" class="form-control @error('editTitulo') is-invalid @enderror" wire:model.defer="editTitulo">
                            @error('editTitulo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Texto</label>
                            <textarea class="form-control @error('editConteudo') is-invalid @enderror" rows="5" wire:model.defer="editConteudo"></textarea>
                            @error('editConteudo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-8">
                            <label class="form-label">Link externo</label>
                            <input class="form-control @error('editLinkExterno') is-invalid @enderror" wire:model.defer="editLinkExterno">
                            @error('editLinkExterno') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-4">
                            <label class="form-label">Nome do link</label>
                            <input class="form-control @error('editLinkTitle') is-invalid @enderror" wire:model.defer="editLinkTitle">
                            @error('editLinkTitle') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-3">Salvar</button>
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
