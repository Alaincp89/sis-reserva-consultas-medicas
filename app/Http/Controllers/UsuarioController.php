<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index(){

        $usuarios = User::all();
        return view('admin.usuarios.index',compact('usuarios'));
    }
    public function create(){
        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:250',
            'email' => 'required|max:250|unique:users',
            'password' => 'required|max:250|confirmed',
        ]);
    
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();
    
        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'El registro del usuario fue exitoso')
            ->with('icono', 'success');
    }

    public function show($id){
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.show',compact('usuario'));
    }

    public function edit($id){
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.edit',compact('usuario'));
    }
    
    public function update(Request $request, $id){
        $usuario = User::find($id);

        $request->validate([
            'name' => 'required|max:250',
            'email' => 'required|max:250|unique:users,email,'.$usuario->id,
            'password' => 'max:250|confirmed',
        ]);
       
        $usuario->name = $request->name;
        $usuario->email = $request->email;       
        if($request->filled('password')){
            $usuario->password = Hash::make($request->password);
        }       
        $usuario->save();

        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'El usuario ha sido actualizado de manera correcta')
            ->with('icono', 'success');
    }

    public function confirmDelete($id){
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.delete',compact('usuario'));
    }

    public function destroy($id){
        User::destroy($id);
        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'El usuario ha sido eliminado de manera correcta')
            ->with('icono', 'success');
    }
}