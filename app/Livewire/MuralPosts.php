<?php

namespace App\Livewire;

use App\Models\MuralPost;
use App\Models\MuralPostComment;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MuralPosts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public int $perPage = 10;
    public ?int $selectedPostId = null;
    public string $commentText = '';
    public string $editTitulo = '';
    public string $editConteudo = '';
    public ?string $editLinkExterno = null;
    public ?string $editLinkTitle = null;

    protected $listeners = [
    'mural-post-created' => 'refreshList',
    ];

    public function refreshList(): void
    {
        $this->resetPage();
    }

    private function uid(): int
    {
        return (int) (Auth::user()->id);
    }

    private function isOwnerPost(MuralPost $post): bool
    {
        return (int) $post->funcionario_id === $this->uid();
    }

    private function usersByIds(array $ids)
    {
        if (empty($ids)) {
            return collect();
        }

        return User::query()
            ->whereIn('id', $ids)
            ->orderBy('name')
            ->get(['id', 'name']);
    }

    public function openComments(int $postId): void
    {
        $this->selectedPostId = $postId;
        $this->commentText = '';
        $this->dispatch('open-modal', id: 'modal-comentarios');
    }

    public function openResults(int $postId): void
    {
        $this->selectedPostId = $postId;
        $this->dispatch('open-modal', id: 'modal-resultados');
    }

    public function openCientes(int $postId): void
    {
        $this->selectedPostId = $postId;
        $this->dispatch('open-modal', id: 'modal-cientes');
    }

    public function openEdit(int $postId): void
    {
        $post = MuralPost::findOrFail($postId);

        if (!$this->isOwnerPost($post)) {
            abort(403);
        }

        $this->selectedPostId = $postId;
        $this->editTitulo = (string) $post->titulo;
        $this->editConteudo = (string) $post->conteudo;
        $this->editLinkExterno = $post->link_externo;
        $this->editLinkTitle = $post->link_title;

        $this->dispatch('open-modal', id: 'modal-editar-post');
    }

    public function saveEdit(): void
    {
        $post = MuralPost::findOrFail($this->selectedPostId);

        if (!$this->isOwnerPost($post)) {
            abort(403);
        }

        $this->validate([
            'editTitulo' => ['required', 'string', 'max:255'],
            'editConteudo' => ['nullable', 'string'],
            'editLinkExterno' => ['nullable', 'string', 'max:2048'],
            'editLinkTitle' => ['nullable', 'string', 'max:255'],
        ]);

        $post->update([
            'titulo' => $this->editTitulo,
            'conteudo' => $this->editConteudo,
            'link_externo' => $this->editLinkExterno,
            'link_title' => $this->editLinkTitle,
            'edited_at' => now(),
        ]);

        $this->dispatch('close-modal', id: 'modal-editar-post');
    }

    public function deletePost(int $postId): void
    {
        $post = MuralPost::findOrFail($postId);

        if (!$this->isOwnerPost($post)) {
            abort(403);
        }

        $post->delete();
    }

    public function voteYes(int $postId): void
    {
        $this->vote($postId, true);
    }

    public function voteNo(int $postId): void
    {
        $this->vote($postId, false);
    }

    private function vote(int $postId, bool $yes): void
    {
        $uid = $this->uid();

        $post = MuralPost::findOrFail($postId);

        if ((string) $post->modalidade !== '2') {
            return;
        }

        if ((bool) $post->enquete_end) {
            return; // enquete encerrada: não aceita voto
        }

        $yesArr = $post->users_vote_yes ?? [];
        $noArr  = $post->users_vote_no ?? [];

        if (in_array($uid, $yesArr, true) || in_array($uid, $noArr, true)) {
            return;
        }

        $yes
            ? $yesArr[] = $uid
            : $noArr[] = $uid;

        $post->update([
            'users_vote_yes' => array_values(array_unique($yesArr)),
            'users_vote_no'  => array_values(array_unique($noArr)),
        ]);
    }

    public function endPoll(int $postId): void
    {
        $post = MuralPost::findOrFail($postId);
        if (!$this->isOwnerPost($post)) {
            abort(403);
        }
        if ((string) $post->modalidade !== '2') {
            return;
        }
        if ((bool) $post->enquete_end) {
            return;
        }
        $post->update(['enquete_end' => 1]);
    }

    public function markCiente(int $postId): void
    {
        $uid = $this->uid();

        $post = MuralPost::findOrFail($postId);

        if ((string) $post->modalidade !== '1') {
            return;
        }

        $arr = $post->users_cientes ?? [];

        if (!in_array($uid, $arr, true)) {
            $arr[] = $uid;
            $post->update([
                'users_cientes' => array_values(array_unique($arr)),
            ]);
        }
    }

    public function addComment(): void
    {
        $this->validate([
            'commentText' => ['required', 'string', 'max:5000'],
        ]);

        MuralPostComment::create([
            'post_id' => $this->selectedPostId,
            'funcionario_id' => $this->uid(),
            'comentario' => $this->commentText,
        ]);

        $this->commentText = '';
    }

    public function deleteComment(int $commentId): void
    {
        $comment = MuralPostComment::findOrFail($commentId);

        if ((int) $comment->funcionario_id !== $this->uid()) {
            abort(403);
        }

        $comment->delete();
    }

    private function queryVigentes()
    {
        $today = Carbon::today()->toDateString();

        return MuralPost::query()
            ->whereNull('deleted_at')
            ->where(function ($q) use ($today) {
                $q->where('tipo', 1)
                  ->orWhere(function ($q2) use ($today) {
                      $q2->whereDate('data_inicio', '<=', $today)
                         ->where(function ($q3) use ($today) {
                             $q3->whereNull('data_termino')
                                ->orWhereDate('data_termino', '>=', $today);
                         });
                  });
            })
            ->orderByDesc('created_at');
    }

    public function render()
    {
        $posts = $this->queryVigentes()
            ->with(['attachments', 'funcionario'])
            ->paginate($this->perPage);

        $selectedPost = null;
        $comments = collect();
        $voteYesUsers = collect();
        $voteNoUsers = collect();
        $cienteUsers = collect();

        if ($this->selectedPostId) {
            $selectedPost = MuralPost::with(['attachments', 'funcionario'])
                ->find($this->selectedPostId);

            if ($selectedPost) {
                $comments = MuralPostComment::where('post_id', $selectedPost->id)
                    ->orderByDesc('created_at')
                    ->get();

                $voteYesUsers = $this->usersByIds($selectedPost->users_vote_yes ?? []);
                $voteNoUsers  = $this->usersByIds($selectedPost->users_vote_no ?? []);
                $cienteUsers  = $this->usersByIds($selectedPost->users_cientes ?? []);
            }
        }

        return view('livewire.mural-posts', compact(
            'posts',
            'selectedPost',
            'comments',
            'voteYesUsers',
            'voteNoUsers',
            'cienteUsers'
        ));
    }
}
