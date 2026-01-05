<?php

namespace App\Livewire\Intranet;

use Livewire\Component;
use App\Models\IntranetLink;
use Livewire\Attributes\Validate;

class Links extends Component
{
    public $links;

    #[Validate('required|string|max:255')]
    public $category = 'Geral';

    #[Validate('required|min:3')]
    public $description = '';

    #[Validate('required|url')]
    public $link = '';

    public $linkId = null;
    public $isEditing = false;
    public $confirmingLinkDeletion = false;

    public function render()
    {
        $this->links = IntranetLink::orderBy('category')->orderBy('description')->get();
        return view('livewire.intranet.links');
    }

    protected function messages()
    {
        return [
            'category.required' => 'O campo categoria é obrigatório.',
            'description.required' => 'O campo descrição é obrigatório.',
            'description.min' => 'A descrição deve ter pelo menos 3 caracteres.',
            'link.required' => 'O endereço do link é obrigatório.',
            'link.url' => 'Insira um formato de link válido (ex: https://...).',
        ];
    }

    public function store()
    {
        $this->validate();
        IntranetLink::create([
            'category' => $this->category,
            'description' => $this->description,
            'link' => $this->link,
        ]);
        $this->reset(['category', 'description', 'link']);
        $this->dispatch('close-modal');
        $this->dispatch('notify', 'Link created successfully!');
    }

    public function edit($id)
    {
        $link = IntranetLink::findOrFail($id);
        $this->linkId = $id;
        $this->category = $link->category;
        $this->description = $link->description;
        $this->link = $link->link;
        $this->isEditing = true;
        $this->dispatch('open-modal');
    }

    public function update()
    {
        $this->validate();
        if ($this->linkId) {
            $link = IntranetLink::findOrFail($this->linkId);
            $link->update([
                'category' => $this->category,
                'description' => $this->description,
                'link' => $this->link,
            ]);
            $this->reset(['category', 'description', 'link', 'linkId', 'isEditing']);
            $this->dispatch('close-modal');
            $this->dispatch('notify', 'Link updated successfully!');
        }
    }

    public function delete($id)
    {
        IntranetLink::find($id)->delete();
        $this->dispatch('notify', 'Link deleted successfully!');
    }

    public function create()
    {
        $this->reset(['category', 'description', 'link', 'linkId', 'isEditing']);
        $this->dispatch('open-modal');
    }
}
