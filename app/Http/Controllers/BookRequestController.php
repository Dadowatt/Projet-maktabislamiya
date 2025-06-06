<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\BookRequest;
use App\Models\Livre;
use Illuminate\Http\Request;

class BookRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes = BookRequest::latest()->get();
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
        return view('user.demande_livre.create', compact( 'auteurs', 'livre', 'livresRecents', 'topAuteurs', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'titre_livre' => 'required|string|max:255',
        'nom_auteur' => 'nullable|string|max:255',
        'user_name' => 'required|string|max:100',
        'email' => 'required|email|max:255',
        'details' => 'nullable|string',
    ]);

    BookRequest::create($validated);

    return redirect()->back()->with('success', 'Votre demande a été envoyée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BookRequest $bookRequest, $id)
    {
        $demande = BookRequest::findOrFail($id);
        return view('admin.demande_livre.show', compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookRequest $bookRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookRequest $bookRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookRequest $bookRequest, $id)
    {
        $demande = BookRequest::findOrFail($id);
        $demande->delete();
        return redirect()->route('admin.demande_livre.index')->with('success', 'Demande supprimée avec succès.');
    }
}
