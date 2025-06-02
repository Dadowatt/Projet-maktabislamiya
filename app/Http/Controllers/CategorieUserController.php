<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Categorie;
use App\Models\Livre;
use Illuminate\Http\Request;

class CategorieUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function themesChoisi()
    {
        $user = auth()->user();
        $categories = $user->categories()->with('livres.auteur')->get();
        $livres = Livre::with(['auteur', 'categorie'])->latest()->get();
        $livresRecents = Livre::latest()->take(3)->get();
        $topAuteurs = Auteur::withCount('followers')->orderByDesc('followers_count')->take(3)->get();
        $auteurs = Auteur::withCount('followers')->get();

        return view('user.themes.index', compact('categories', 'livres', 'auteurs', 'livresRecents', 'topAuteurs'));
    }

    public function choisirThemes(Request $request)
    {
        $user = auth()->user();
        $user->categories()->syncWithoutDetaching($request->categories);

        return redirect()->route('user.themes')->with('success', 'Thèmes enregistrés avec succès');
    }

    public function retirerTheme(Categorie $categorie)
    {
        $user = auth()->user();
        $user->categories()->detach($categorie->id);

        return redirect()->route('user.themes')->with('success', 'Thème retiré avec succès.');
    }

    public function index()
    {
        $categories = Categorie::all();
        $livres = Livre::with('auteur')->latest()->get();
        $livresRecents = Livre::latest()->take(3)->get();
        $topAuteurs = Auteur::withCount('followers')->orderByDesc('followers_count')->take(3)->get();
        $auteurs = Auteur::withCount('followers')->get();

        return view('user.categories.index', compact('categories', 'livres', 'livresRecents', 'topAuteurs', 'auteurs'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categorie = Categorie::findOrFail($id);
        $livres = $categorie->livres()->with('auteur')->get();
        $livresRecents = Livre::latest()->take(3)->get();
        $topAuteurs = Auteur::withCount('followers')->orderByDesc('followers_count')->take(3)->get();

        return view('user.categories.show', compact('categorie', 'livres', 'livresRecents', 'topAuteurs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
