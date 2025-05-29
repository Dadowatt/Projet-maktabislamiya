<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Categorie;
use App\Models\Livre;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
{
    $livres = Livre::with(['auteur', 'notes'])->latest()->get();
    $livresRecents = Livre::latest()->take(3)->get();
    $topAuteurs = Auteur::take(3)->get();
    $auteurs = Auteur::withCount('followers')->get();
    $categories = Categorie::all();

    return view('user.home', compact('livres', 'livresRecents', 'topAuteurs', 'categories', 'auteurs'));
}

public function livres() {
     return view('user.livres');

     }
    public function themes() { return view('user.themes'); }
    public function auteurs() { return view('user.auteurs'); }
    public function mesAuteurs() { return view('user.auteurs-suivi'); }
    public function lectureList() { return view('user.lecture_list'); }
    public function favoris() { return view('user.favoris'); }
    public function detailLivre($id) { return view('user.detail_livre', compact('id')); }
}
