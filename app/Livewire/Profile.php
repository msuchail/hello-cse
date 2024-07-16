<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Profile extends Component
{
    use WithPagination;

    #[Url]
    public int|null $id;

    public string $search = '';

    public function render()
    {
        $title = isset($this->id) ? 'Détails du profil' : 'Liste des profils';
        return view('livewire.profile', [
            'activeProfile' => \App\Models\Profile::find($this->id ?? null),
            'profiles' => \App\Models\Profile::active()
                ->whereAny(['prenom', 'nom'], 'like', '%'.$this->search.'%')
                ->paginate(8),
        ])->title($title);
    }
    public function openModal(int $id)
    {
        $this->id = $id;
    }

    public function closeModal()
    {
        $this->id = null;
    }

    public function updatedSearch($value)
    {
        $this->resetPage();
    }
}
