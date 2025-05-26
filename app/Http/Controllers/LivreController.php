<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Categorie;
use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livres = Livre::with(['auteur', 'categorie'])->get();
        return view('admin.livres.index', compact('livres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auteurs = Auteur::all();
        $categories = Categorie::all();
        return view('admin.livres.create', compact('auteurs', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_couverture' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'pdf_url' => 'required|url',
            'auteur_id' => 'required|exists:auteurs,id',
            'categorie_id' => 'nullable|exists:categories,id',
        ]);
        $imagePath = null;
        if ($request->hasFile('image_couverture')) {
            $imagePath = $request->file('image_couverture')->store('livres/couvertures', 'public');
        }

        // $pdfPath = $request->file('pdf_url')->store('livres/pdfs', 'public');
        $pdfPath = $request->pdf_url;
        Livre::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'image_couverture' => $imagePath,
            'pdf_url' => $pdfPath,
            'auteur_id' => $request->auteur_id,
            'categorie_id' => $request->categorie_id,
        ]);

        return redirect()->route('admin.livres.index')->with('success', 'Livre ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Livre $livre)
    {
        return view('admin.livres.show', compact('livre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livre $livre)
    {
        $auteurs = Auteur::all();
        $categories = Categorie::all();
        return view('admin.livres.edit', compact('livre', 'auteurs', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livre $livre)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_couverture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf_url' => 'required|url',
            'auteur_id' => 'required|exists:auteurs,id',
            'categorie_id' => 'nullable|exists:categories,id',
        ]);

        if ($request->hasFile('image_couverture')) {
            $imagePath = $request->file('image_couverture')->store('livres/couvertures', 'public');
            $livre->image_couverture = $imagePath;
        }

        // if ($request->hasFile('pdf_url')) {
        //     $pdfPath = $request->file('pdf_url')->store('livres/pdfs', 'public');
        //     $livre->pdf_url = $pdfPath;
        // }

        if ($request->hasFile('image_couverture')) {
            $imagePath = $request->file('image_couverture')->store('livres/couvertures', 'public');
            $livre->image_couverture = $imagePath;
       }

        $livre->titre = $request->titre;
        $livre->description = $request->description;
        $livre->auteur_id = $request->auteur_id;
        $livre->categorie_id = $request->categorie_id;
        $livre->save();

        return redirect()->route('admin.livres.index')->with('success', 'Livre modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livre $livre)
    {
        $livre->delete();
        return redirect()->route('admin.livres.index')->with('success', 'Livre supprimé avec succès.');
    }
}
