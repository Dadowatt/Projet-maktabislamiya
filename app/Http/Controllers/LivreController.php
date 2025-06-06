<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
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
        'auteur_id' => 'required|exists:auteurs,id',
        'categorie_id' => 'required|exists:categories,id',
        'image_couverture' => 'nullable|image|mimes:jpeg,png,webp,jpg,gif|max:2048',
        'pdf_url' => 'nullable|mimes:pdf|max:30000',
    ]);

    // Création d'une nouvelle instance de Livre
    $livre = new Livre();
    $livre->titre = $request->titre;
    $livre->description = $request->description;
    $livre->auteur_id = $request->auteur_id;
    $livre->categorie_id = $request->categorie_id;

    // Upload de l'image
    if ($request->hasFile('image_couverture')) {
        $pathImage = $request->file('image_couverture')->store('livres/images', 'public');
        $livre->image_couverture = $pathImage;
    }

    // Upload du fichier PDF
    if ($request->hasFile('pdf_url')) {
        $pathPdf = $request->file('pdf_url')->store('livres/pdfs', 'public');
        $livre->pdf_url = $pathPdf;
    }

    // Enregistrement du livre
    $livre->save();

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
        'auteur_id' => 'required|exists:auteurs,id',
        'categorie_id' => 'required|exists:categories,id',
        'image_couverture' => 'nullable|image|mimes:jpeg,png,webp,jpg,gif|max:2048',
        'pdf_url' => 'nullable|mimes:pdf|max:30000',
    ]);

    // Mise à jour des champs
    $livre->titre = $request->titre;
    $livre->description = $request->description;
    $livre->auteur_id = $request->auteur_id;
    $livre->categorie_id = $request->categorie_id;

    // Si une nouvelle image est uploadée
    if ($request->hasFile('image_couverture')) {
    // Supprimer l'ancienne image
        if ($livre->image_couverture && Storage::disk('public')->exists($livre->image_couverture)) {
            Storage::disk('public')->delete($livre->image_couverture);
        }

        // Enregistrer la nouvelle image
        $imagePath = $request->file('image_couverture')->store('livres/images', 'public');
        $livre->image_couverture = $imagePath;
    }

    // Si un nouveau PDF est uploadé
    if ($request->hasFile('pdf_url')) {
        // Supprimer l'ancien PDF
        if ($livre->pdf_url && Storage::disk('public')->exists($livre->pdf_url)) {
            Storage::disk('public')->delete($livre->pdf_url);
        }

        // Enregistrer le nouveau PDF
        $pdfPath = $request->file('pdf_url')->store('livres/pdfs', 'public');
        $livre->pdf_url = $pdfPath;
    }

    // Enregistrer les modifications
    $livre->save();

    // Redirection avec message de succès
    return redirect()->route('admin.livres.index')->with('success', 'Livre mis à jour avec succès.');
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
