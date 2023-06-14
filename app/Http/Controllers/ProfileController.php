<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $user = $request->user();

    $validatedData = $request->validated();

    if (isset($request->cep)) {
        $user->cep = $request->cep;
    }

    if (isset($request->house_number)) {
        $user->house_number = $request->house_number;
    }

    if ($request->hasFile('img')) {
        $arquivo = $request->file('img');
        $arquivoSalvo = $arquivo->store('public/ImagensProdutos');

        $validatedData['img'] = $arquivoSalvo;

        $arquivoSalvo = explode("/", $arquivoSalvo);
        $tamanho = count($arquivoSalvo);

        $user->image = $arquivoSalvo[$tamanho - 1];
    }

    $user->fill($validatedData);

    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    $user->save();

    return Redirect::route('profile.edit')->with('status', 'profile-updated');
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
