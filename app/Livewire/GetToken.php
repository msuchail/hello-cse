<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Laravel\Sanctum\Guard;
use Livewire\Component;

class GetToken extends Component
{
    public Collection|null $tokens;
    public bool $modal = false;
    public array $abilitiesOptions;


    public string $tokenName = '';
    public string $tokenAbilities = 'read';
    public string $tokenExpiration;


    public function boot() {
        $this->abilitiesOptions = [
            'Lecture seule'=>'read',
            'Lecture et écriture'=>'write',
            'Lecture, écriture et suppression'=>'delete',
        ];
        $this->tokenExpiration = now()->addYear()->format('Y-m-d');
    }
    public function mount()
    {
        $this->tokens = Auth::user()->tokens;
    }

    public function render()
    {
        return view('livewire.get-token')->title('Token API');
    }
    public function showModal()
    {
        $this->modal = true;
    }
    public function closeModal()
    {
        $this->modal = false;
    }
    public function createToken() {
        $this->validate([
            'tokenName' => 'required|alpha|string|min:6|max:30',
            'tokenAbilities' => 'required|string',
            'tokenExpiration' => 'required|date|after:now',
        ]);

        switch ($this->tokenAbilities) {
            case 'read':
                $tokenAbilities = ['read'];
                break;
            case 'write':
                $tokenAbilities = ['read', 'write'];
                break;
            case 'delete':
                $tokenAbilities = ['read', 'write', 'delete'];
                break;
        }

        $token = Auth::user()->createToken($this->tokenName, $tokenAbilities, Date::createFromFormat('Y-m-d', $this->tokenExpiration));
        $token = $token->plainTextToken;
        $this->tokens = Auth::user()->tokens;
        $this->closeModal();
        $this->dispatch('tokenCreated', $token);
    }
    public function deleteToken($tokenId) {
        Auth::user()->tokens()->where('id', $tokenId)->delete();
        $this->tokens = Auth::user()->tokens;
    }
}
