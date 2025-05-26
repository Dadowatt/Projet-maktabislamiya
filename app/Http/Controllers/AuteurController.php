<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auteurs = Auteur::all();
        return view('admin.auteurs.index', compact('auteurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.auteurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nom' => 'required|string|max:255',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif,svg|max:2048'
    ]);

    $photoPath = null;
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('auteurs', 'public');
    }

    Auteur::create([
        'nom' => $request->nom,
        'photo' => $photoPath,
    ]);

    return redirect()->route('admin.auteurs.index')->with('success', 'Auteur ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Auteur $auteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auteur $auteur)
    {
        return view('admin.auteurs.edit', compact('auteur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auteur $auteur)
    {
        $request->validate([
        'nom' => 'required|string|max:255',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif,svg|max:2048'
    ]);

    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('auteurs', 'public');
        $auteur->photo = $photoPath;
    }

    $auteur->nom = $request->nom;
    $auteur->save();

    return redirect()->route('admin.auteurs.index')->with('success', 'Auteur modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auteur $auteur)
    {
        $auteur->delete;
        return redirect()->route('admin.auteurs.index')->with('success', 'Auteur supprimé avec succès.');
    }
}
