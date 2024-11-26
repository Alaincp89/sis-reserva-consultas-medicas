<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SecretariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secretarias = Secretaria::with('user')->get();
        return view('admin.secretarias.index', compact('secretarias'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.secretarias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'nombres' => 'required',
            'apellidos' =>'required',
            'cedula' =>'required|unique:secretarias',
            'celular' =>'required',
            'direccion' => 'required',
            'ciudad' =>'required',
            'departamento' =>'required',
            'codigo_postal' =>'required',
            'num_seguro_social' =>'required',
            'email' => 'required|max:250|unique:users',
            'password' => 'required|max:250|confirmed',
        ]);

        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        $secretaria = new Secretaria();
        $secretaria->user_id = $usuario->id;
        $secretaria->nombres = $request->nombres;
        $secretaria->apellidos = $request->apellidos;
        $secretaria->cedula = $request->cedula;
        $secretaria->celular = $request->celular;
        $secretaria->direccion = $request->direccion;
        $secretaria->ciudad = $request->ciudad;
        $secretaria->departamento = $request->departamento;
        $secretaria->codigo_postal = $request->codigo_postal;
        $secretaria->num_seguro_social = $request->num_seguro_social;
        $secretaria->save();
   
        return redirect()->route('admin.secretarias.index')
            ->with('mensaje', 'El registro de la secretaria fue exitoso')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.show',compact('secretaria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.edit',compact('secretaria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $secretaria = Secretaria::find($id);

        $request->validate([
            'nombres' => 'required',
            'apellidos' =>'required',
            'cedula' =>'required|unique:secretarias,cedula,'.$secretaria->id,
            'celular' =>'required',
            'direccion' => 'required',
            'ciudad' =>'required',
            'departamento' =>'required',
            'codigo_postal' =>'required',
            'num_seguro_social' =>'required',
            'email' => 'required|max:250|unique:users,email,'.$secretaria->user->id,
            'password' => 'nullable|max:250|confirmed',
        ]);

        $secretaria->nombres = $request->nombres;
        $secretaria->apellidos = $request->apellidos;
        $secretaria->cedula = $request->cedula;
        $secretaria->celular = $request->celular;
        $secretaria->direccion = $request->direccion;
        $secretaria->ciudad = $request->ciudad;
        $secretaria->departamento = $request->departamento;
        $secretaria->codigo_postal = $request->codigo_postal;
        $secretaria->num_seguro_social = $request->num_seguro_social;
        $secretaria->save();
   
        $usuario = User::find($secretaria->user->id);
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;       
        if($request->filled('password')){
            $usuario->password = Hash::make($request->password);
        }       
        $usuario->save();

        return redirect()->route('admin.secretarias.index')
            ->with('mensaje', 'Los datos de la secretaria han sido actualizado de manera correcta')
            ->with('icono', 'success');
    }

    public function confirmDelete($id){

        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.delete',compact('secretaria'));
    }

    public function destroy($id)
    {
        $secretaria = Secretaria::find($id);

        //Eliminar usuario 
        $user = $secretaria->user;
        $user->delete();

        //Eliminar secretaria
        $secretaria->delete();

        return redirect()->route('admin.secretarias.index')
            ->with('mensaje', 'Los datos de la secretaria se han sido eliminado de manera correcta')
            ->with('icono', 'success');
    }
}
