<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //protegemos la ruta
    }

    public function index()
    {
        return view('perfil.index');
    }
}
