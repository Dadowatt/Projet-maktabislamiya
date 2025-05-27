<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Favoris;
use App\Models\Livre;
use App\Models\Note;
use Auth;
use Illuminate\Http\Request;

class LivreUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $livre = Livre::with(['auteur', 'categorie', 'notes'])->findOrFail($id);
    $noteMoyenne = $livre->notes()->avg('valeur');
    $nbAvis = $livre->notes()->count();
    $userNote = null;
    if (auth()->check()) {
    $userNote = $livre->notes()->where('user_id', auth()->id())->value('valeur');
    }
    $livresRecents = Livre::latest()->take(3)->get();
    $topAuteurs = Auteur::withCount('followers')->orderByDesc('followers_count')->take(3)->get();

    return view('user.livres.detail_livre', compact('livre', 'noteMoyenne', 'nbAvis', 'userNote', 'livresRecents', 'topAuteurs'));
        
    }

    public function note(Request $request, $id)
    {
        $request->validate([
            'note' => 'required|integer|min:1|max:5',
        ]);

        Note::updateOrCreate(
            ['user_id' => Auth::id(), 'livre_id' => $id],
            ['note' => $request->note]
        );

        return back()->with('success', 'Votre note a bien été enregistrée.');
    }

    public function favoris(Request $request, $id)
    {
        Favoris::firstOrCreate([
            'user_id' => Auth::id(),
            'livre_id' => $id,
        ]);

        return back()->with('success', 'Livre ajouté à vos favoris.');
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
