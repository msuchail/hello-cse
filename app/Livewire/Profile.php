<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

class Profile extends Component
{
    public Collection $profiles;
    #[Url]
    public int|null $id;

    public function boot()
    {
        $this->profiles = \App\Models\Profile::active()->get();
    }

    public function render()
    {
        $title = isset($this->id) ? 'Détails du profil' : 'Liste des profils';
        return view('livewire.profile', ['activeProfile' => \App\Models\Profile::find($this->id ?? null)])->title($title);
    }

    public function openModal(int $id)
    {
        $this->id = $id;
    }

    public function closeModal()
    {
        $this->id = null;
    }
}
