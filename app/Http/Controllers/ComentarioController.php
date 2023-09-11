<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user, Post $post)
    {
        // dd($post);
        //validar
        $this->validate($request,[
            'coment'=>'required|max:255'
        ]);
        //almacenar
        Comentario::create([
            'user_id'=>auth()->user()->id,
            'post_id'=>$post->id,
            'coment'=>$request->coment

        ]);
        //imprimir
        return back()->with('mensaje','Comentario realizado correctamente');
    }
}
