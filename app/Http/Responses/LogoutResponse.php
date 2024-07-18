<?php

namespace App\Http\Responses;

use Filament\Http\Responses\Auth\Contracts\LogoutResponse as Responsable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LogoutResponse implements Responsable
{
    public function toResponse($request): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('profiles.index');
    }
}
