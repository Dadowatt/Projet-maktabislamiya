<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Categorie;
use App\Models\Lecture;
use App\Models\Livre;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        //  return view('admin.dashboard');
        $livres = Livre::count();
        $utilisateurs = User::count();
        $categories = Categorie::count();
        $consultations = Lecture::count();
        $topAuteurs = Auteur::withCount('followers')->orderByDesc('followers_count')->take(5)->get();

        return view('admin.dashboard', compact(
            'livres',
            'categories',
            'utilisateurs',
            'consultations',
            'topAuteurs'
        ));
    }
    public function livres()
    {
        return view('admin.livres');
    }
    public function auteurs()
    {
        return view('admin.auteurs');
    }
    public function categories()
    {
        return view('admin.categories');
    }

}
