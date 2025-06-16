<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\DemandeLivre;
use App\Models\Livre;
use Illuminate\Http\Request;

class DemandeLivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes = DemandeLivre::latest()->get();
        return view('admin.demande_livre.index', compact('demandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $livre = Livre::with(['auteur', 'categorie', 'notes']);
        $categories = $user->categories()->with('livres.auteur')->get();
        $livresRecents = Livre::latest()->take(3)->get();
        $topAuteurs = Auteur::withCount('followers')->orderByDesc('followers_count')->take(3)->get();
        $auteurs = Auteur::withCount(['followers', 'livres'])->get();
        return view('user.demande_livre.create', compact('auteurs', 'livre', 'livresRecents', 'topAuteurs', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre_livre' => 'required|string|max:255',
            'nom_auteur' => 'nullable|string|max:255',
            'details' => 'nullable|string',
        ]);

        $user = auth()->user();

        DemandeLivre::create([
            'titre_livre' => $request->titre_livre,
            'nom_auteur' => $request->nom_auteur,
            'user_name' => $user->nom ?? $user->name,
            'email' => $user->email,
            'details' => $request->details,
        ]);

        return redirect()->back()->with('success', 'Votre demande a été envoyée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DemandeLivre $demandeLivre, $id)
    {
        $demande = DemandeLivre::findOrFail($id);
        return view('admin.demande_livre.show', compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DemandeLivre $demandeLivre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DemandeLivre $demandeLivre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DemandeLivre $demandeLivre, $id)
    {
        $demande = DemandeLivre::findOrFail($id);
        $demande->delete();
        return redirect()->route('admin.demande_livre.index')->with('success', 'Demande supprimée avec succès.');
    }
}
