<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() { return view('admin.dashboard'); }
    public function livres() { return view('admin.livres'); }
    public function auteurs() { return view('admin.auteurs'); }
    public function categories() { return view('admin.categories'); }

}
