<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
{
    return view('user.home');
}
public function livres() { return view('users.livres'); }
    public function themes() { return view('users.themes'); }
    public function auteurs() { return view('users.auteurs'); }
    public function mesAuteurs() { return view('users.auteurs-suivi'); }
    public function lectureList() { return view('users.lecture_list'); }
    public function favoris() { return view('users.favoris'); }
    public function profile() { return view('users.profil'); }
    public function parametre() { return view('users.parametre'); }
    public function detailLivre($id) { return view('users.detail_livre', compact('id')); }
}
