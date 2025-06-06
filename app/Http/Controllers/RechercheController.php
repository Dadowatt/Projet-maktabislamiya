<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Categorie;
use App\Models\Livre;
use Illuminate\Http\Request;

class RechercheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $livres = Livre::with(['auteur', 'notes'])->latest()->get();
         $topAuteurs = Auteur::withCount('followers')->orderByDesc('followers_count')->take(3)->get();
         $auteurs = Auteur::withCount('followers')->get();
         $categories = Categorie::all();
         $livresRecents = Livre::latest()->take(3)->get();

        $type = $request->input('type');
       $query = $request->input('q');

    if ($type === 'livre') {
        $livres = Livre::where('titre', 'like', "%{$query}%")
            ->with(['auteur', 'notes'])
            ->get();

        return view('user.recherche.livres', compact('livres', 'query', 'livresRecents', 'topAuteurs', 'categories', 'auteurs'));
        } elseif ($type === 'auteur') {
        $auteurs = Auteur::where('nom', 'like', "%{$query}%")
            ->withCount(['followers', 'livres'])
            ->get();

        return view('user.recherche.auteurs', compact('auteurs', 'query', 'livres', 'livresRecents', 'topAuteurs', 'categories'));
    
    } elseif ($type === 'categorie') {
    $categories = Categorie::where('nom', 'like', "%{$query}%")->with(['livres.auteur', 'livres.notes'])->get();

    // Regrouper les livres par nom de catégorie
    $livres = [];
    foreach ($categories as $categorie) {
        $livres[$categorie->nom] = $categorie->livres;
    }

    return view('user.recherche.categorie', compact('livres', 'query', 'livresRecents', 'topAuteurs', 'categories', 'auteurs'));
} else {
        return redirect()->back()->with('error', 'Type de recherche invalide.');
    }
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
        //
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
