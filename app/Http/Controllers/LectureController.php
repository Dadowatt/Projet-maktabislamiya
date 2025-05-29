<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Categorie;
use App\Models\Livre;
use Auth;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function lire($id)
{
    $livre = Livre::findOrFail($id);
    $user = auth()->user();

    // Enregistrer la lecture s’il n’existe pas déjà
    $user->lectures()->syncWithoutDetaching([$livre->id]);

    // Rediriger vers le PDF
    return redirect(asset('storage/' . $livre->pdf_url));
}
     public function index()
    {
        $user = auth()->user();
    $lectures = $user->lectures()->with('auteur')->get();
     $livres = Livre::with('auteur')->latest()->get();
    $livresRecents = Livre::latest()->take(3)->get();
    $topAuteurs = Auteur::take(3)->get();
    $auteurs = Auteur::withCount('followers')->get();
    $categories = Categorie::all();
    return view('user.lectures.index', compact('lectures','livres', 'livresRecents', 'topAuteurs', 'categories', 'auteurs'));
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
    public function store($id)
    {
        $livre = Livre::findOrFail($id);
        $user = Auth::user();

    if (!$user->lectures->contains($livre->id)) {
        $user->lectures()->attach($livre->id);
    }

    return redirect()->to(asset('storage/'.$livre->pdf_url));
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
