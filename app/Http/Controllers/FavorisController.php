<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Favoris;
use App\Models\Livre;
use Illuminate\Http\Request;

class FavorisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favoris = auth()->user()->favoris()->with('livre.auteur', 'livre.notes')->get()->pluck('livre');
         $livresRecents = Livre::latest()->take(3)->get();
         $topAuteurs = Auteur::withCount('followers')->orderByDesc('followers_count')->take(3)->get();
        return view('user.favoris.index', compact('favoris', 'livresRecents', 'topAuteurs'));
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
        $user = auth()->user();

    $favori = $user->favoris()->where('livre_id', $id)->first();

    if ($favori) {
        // Si le livre est déjà en favori, on le retire
        $favori->delete();
        return back()->with('success', 'Livre retiré de vos favoris.');
    } else {
        // Sinon, on l’ajoute
        $user->favoris()->create(['livre_id' => $id]);
        return back()->with('success', 'Livre ajouté à vos favoris.');
    }
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
