<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    //créer une boutique
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50|unique:stores,name|regex:/^[a-zA-Z0-9-]+$/'
        ], [
            'name.required' => 'Le nom de la boutique est obligatoire.',
            'name.string' => 'Le nom de la boutique doit être une chaîne de caractères.',
            'name.min' => 'Le nom doit avoir au moins 3 caractères.',
            'name.max' => 'Le nom ne doit pas dépasser 50 caractères.',
            'name.unique' => 'Ce nom de boutique est déjà pris.',
            'name.regex' => 'Le nom ne doit contenir que des lettres, chiffres et tirets.'
        ]);
        $store = Store::create([
            'name' => strtolower($request->name),
            'user_id' => Auth::id(),
        ]);
        $baseUrl = config('app.url');
        $subdomainUrl = str_replace(['http://', 'https://'], ['http://' . $store->name . '.', 'https://' . $store->name . '.'], $baseUrl);
        return redirect()->away($subdomainUrl);
    }




    //afficher la boutique
    public function show($storeName)
    {
        $store = Store::where('name', $storeName)->first();

        if (!$store) {
            abort(404, 'Boutique introuvable.');
        }

        $user = $store->user;

        return view('store', [
            'name' => $user->name,
            'email' => $user->email,
            'age' => $user->age
        ]);
    }
}
