<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $posts = Post::where('user_id',$user->id)->paginate(5);
        // dd($post);
        return view('dashboard',[
            'user'=>$user,
            'posts'=>$posts
        ]);
    }

    public function create()
    {
       return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'titulo'=>'required|max:255',
            'descripcion'=>'required',
            'imagen'=> 'required'
        ]);
        // dd('creando el posts');

        // Post::create([
        //     'titulo'=>$request->titulo,
        //     'descripcion'=>$request->descripcion,
        //     'imagen'=>$request->imagen,
        //     'user_id'=>auth()->user()->id
        // ]);

        // Otra forma de guardar registro
        // $post= new Post();
        // $post->titulo = $request->titulo;
        // $post->descripcion = $request->descripcion;
        // $post->imagen = $request->imagen;
        // $post->user_id = $request->aut()->user()->id;
        // $post->save();

        $request->user()->posts()->create([
            'titulo'=>$request->titulo,
            'descripcion'=>$request->descripcion,
            'imagen'=>$request->imagen,
            'user_id'=>auth()->user()->id
        ]);

        return redirect()->route('post.index', auth()->user()->username);
    }

    public function show(User $user,Post $post)
    {
        return view('posts.show',[
            'user'=>$user,
            'post'=>$post,
        ]);
    }

    public function destroy(Post $post)
    {
      $this->authorize('delete',$post);
      $post->delete();

      //Eliminar la imagen
      $image_path = public_path('uploads/'.$post->imagen);

        if(File::exists($image_path)){
        unlink($image_path);
      }

      return redirect()->route('post.index', auth()->user()->username);

    }
}
