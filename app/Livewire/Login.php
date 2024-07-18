<?php

namespace App\Livewire;

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Login extends Component
{

    public string $email;
    public string $password;
    public bool $firstValidation=true;


    public function render()
    {
        return view('livewire.login')->title('Connexion');
    }

    public function mount() {
        if(Auth::check()) {
            return redirect()->route('profiles.index');
        }
    }

    public function updated() {
        if(!$this->firstValidation) {
            $this->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
        }
    }

    public function login()
    {
        $this->firstValidation = false;
        $validated = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated)) {
            Session::regenerate();
            return redirect()->intended(route('profiles.index'));
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe invalide',
            'password' => 'Email ou mot de passe invalide',
        ])->onlyInput('email');
    }
}
