<?php

namespace App\Livewire\Intranet;

use Livewire\Component;
use App\Models\IntranetLink;
use Livewire\Attributes\Validate;

class Links extends Component
{
    public $links;

    #[Validate('required|min:3')]
    public $description = '';

    #[Validate('required|url')]
    public $link = '';

    public $linkId = null;
    public $isEditing = false;
    public $confirmingLinkDeletion = false;

    public function render()
    {
        $this->links = IntranetLink::all();
        return view('livewire.intranet.links');
    }

    public function store()
    {
        $this->validate();

        IntranetLink::create([
            'description' => $this->description,
            'link' => $this->link,
        ]);

        $this->reset(['description', 'link']);
        $this->dispatch('close-modal');
        $this->dispatch('notify', 'Link created successfully!');
    }

    public function edit($id)
    {
        $link = IntranetLink::findOrFail($id);
        $this->linkId = $id;
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
                'description' => $this->description,
                'link' => $this->link,
            ]);

            $this->reset(['description', 'link', 'linkId', 'isEditing']);
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
        $this->reset(['description', 'link', 'linkId', 'isEditing']);
        $this->dispatch('open-modal');
    }
}
