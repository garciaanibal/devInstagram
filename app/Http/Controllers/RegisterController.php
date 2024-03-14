<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() //muestra el formulario
    {
        return view('auth.register');
    }

    //almacenar el usuario
    public function store(REQUEST $request)
    {
        //validacion
        $this->validate($request,[
            'name' => 'required|min:4',
            'username'=>'required|unique:users|min:3|max:20',
            // 'username' => 'required|string|alpha_dash|min:3|max:20|unique:users,username',
            'email'=>'required|unique:users|email|max:60',
            'password'=>'required|confirmed|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'username' => Str::slug($request->username),
            // 'username' => Str::lower($request->username),
            'email' => $request->email,
            'password' => Hash::make( $request->password )
        ]);

        //autenticar usuario
        // auth()->attempt([
        //     'email'=>$request->email,
        //     'password'=>$request->password
        // ]);

        //otra forama de autenticar
        auth()->attempt($request->only('email','password'));

        //redirecciona
        return redirect()->route('posts.index',auth()->user());
    }

}
