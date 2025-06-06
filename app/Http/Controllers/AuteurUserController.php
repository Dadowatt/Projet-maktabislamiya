<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Categorie;
use App\Models\Livre;
use Illuminate\Http\Request;

class AuteurUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function toggleFollow($id)
{
    $auteur = Auteur::findOrFail($id);
    $user = auth()->user()->load('auteurSuivis');

    if ($user->auteurSuivis->contains($auteur->id)) {
        $user->auteurSuivis()->detach($auteur->id);
    } else {
        $user->auteurSuivis()->attach($auteur->id);
    }

    return back()->with('success', 'Action effectuée avec succès.');
}

public function auteursSuivis()
{
    $livres = Livre::with('auteur')->latest()->get();
    $livresRecents = Livre::latest()->take(3)->get();
    $topAuteurs = Auteur::withCount('followers')->orderByDesc('followers_count')->take(3)->get();
    $auteurs = Auteur::withCount('followers')->get();
    $categories = Categorie::all();
    $auteurs = auth()->user()->auteurSuivis()->withCount('followers')->get();
    return view('user.auteurs.auteurs-suivi', compact('auteurs', 'livres', 'livresRecents', 'topAuteurs', 'categories'));
}

     public function index()
    {
        $livres = Livre::with(['auteur', 'notes'])->latest()->get();
        $topAuteurs = Auteur::withCount('followers')->orderByDesc('followers_count')->take(3)->get();
        $auteurs = Auteur::withCount(['followers', 'livres'])->get();
        $categories = Categorie::all();
        $livresRecents = Livre::latest()->take(3)->get();
        $user = auth()->user();
        return view('user.auteurs.index', compact('auteurs', 'user','livres', 'livresRecents', 'topAuteurs', 'categories'));

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
        $auteur = Auteur::with('livres')->withCount('followers')->findOrFail($id);
        $user = auth()->user()->load('auteurSuivis');
        $livresRecents = Livre::latest()->take(3)->get();
        $topAuteurs = Auteur::withCount('followers')->orderByDesc('followers_count')->take(3)->get();

    return view('user.auteurs.show', compact('auteur', 'user', 'livresRecents', 'topAuteurs'));
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
