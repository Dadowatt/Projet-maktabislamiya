<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Categorie;
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
    public function notes(Request $request, $id)
{
    $request->validate([
        'valeur' => 'required|integer|min:1|max:5',
    ]);

    $livre = Livre::findOrFail($id);
    Note::updateOrCreate(
        ['user_id' => auth()->id(), 'livre_id' => $livre->id],
        ['valeur' => $request->note]
    );
    return redirect()->route('user.livres.show', $livre->id)->with('success', 'Votre note a été enregistrée.');
}
     public function index()
    {
        $topAuteurs = Auteur::take(3)->get();
        $auteurs = Auteur::withCount('followers')->get();
        $categories = Categorie::all();
        $livresRecents = Livre::latest()->take(3)->get();
        $livres = Livre::with(['auteur', 'notes'])->get();
        return view('user.livres.index', compact('livres', 'livresRecents', 'topAuteurs', 'categories', 'auteurs'));
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
    
    $noteMoyenne = $livre->notes()->avg('valeur') ?? 0;
    $nbAvis = $livre->notes()->count();
    $userNote = null;
    $estFavori = false;

    if (auth()->check()) {
        $user = auth()->user();
        $userNote = $livre->notes()->where('user_id', $user->id)->value('valeur');
        $estFavori = $user->favoris()->where('livre_id', $livre->id)->exists();
    }
    $user = auth()->user();
    $categories = $user->categories()->with('livres.auteur')->get();
    $livresRecents = Livre::latest()->take(3)->get();
    $topAuteurs = Auteur::withCount('followers')->orderByDesc('followers_count')->take(3)->get();

    return view('user.livres.detail_livre', compact(
        'livre', 'noteMoyenne', 'nbAvis', 'userNote', 'estFavori', 'livresRecents', 'topAuteurs', 'categories'
    ));
        
    }

    public function note(Request $request, $id)
    {
        $request->validate([
            'valeur' => 'required|integer|min:1|max:5',
        ]);

        Note::updateOrCreate(
            ['user_id' => Auth::id(), 'livre_id' => $id],
            ['valeur' => $request->valeur]
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
