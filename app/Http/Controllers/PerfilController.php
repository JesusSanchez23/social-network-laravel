<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
    }
    //
    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => ['required', 'unique:users,username,' . auth()->user()->id, 'min:2', 'max:30', 'not_in:twitter,editar-perfil'],
            'email'=> 'required | email | unique:users,email,'.auth()->user()->id,
            'password'=>'required'

        ]);

        if ($request->imagen) {
            // Debes de crear la carpeta para poder subir la imagen
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000);

            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;

            $imagenServidor->save($imagenPath);
        } 

        // guardar cambios

        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->email = $request->email;

        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('mensaje', 'La contraseña no es correcta');
        }
        
        $usuario->save();

        // redireccionar al usuario

        return redirect()->route('posts.index', $usuario->username);
    }
}
