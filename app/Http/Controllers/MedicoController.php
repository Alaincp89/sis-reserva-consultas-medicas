<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicos = Medico::with('user')->get();
        return view('admin.medicos.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.medicos.create');
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
            'direccion' => 'required',
            'telefono' =>'required',
            'ciudad' =>'required',
            'cedula' =>'required|unique:medicos',
            'num_seguro_social' =>'required',
            'num_colegiado' =>'required',
            'tipo_medico' =>'required',           
            'email' => 'required|max:250|unique:users',
            'password' => 'required|max:250|confirmed',
        ]);

        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        $medico = new Medico();
        $medico->user_id = $usuario->id;
        $medico->nombres = $request->nombres;
        $medico->apellidos = $request->apellidos;
        $medico->direccion = $request->direccion;
        $medico->telefono = $request->telefono;
        $medico->ciudad = $request->ciudad;
        $medico->cedula = $request->cedula;
        $medico->num_seguro_social = $request->num_seguro_social;       
        $medico->num_colegiado = $request->num_colegiado;
        $medico->tipo_medico = $request->tipo_medico;      
        $medico->save();
   
        return redirect()->route('admin.medicos.index')
            ->with('mensaje', 'El registro de la medico fue exitoso')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medico = Medico::with('user')->findOrFail($id);
        return view('admin.medicos.show',compact('medico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medico = Medico::with('user')->findOrFail($id);
        return view('admin.medicos.edit',compact('medico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $medico = Medico::find($id);

        $request->validate([
            'nombres' => 'required',
            'apellidos' =>'required',
            'direccion' => 'required',
            'telefono' =>'required',
            'ciudad' =>'required',
            'cedula' =>'required|unique:medicos,cedula,'.$medico->id,
            'num_seguro_social' =>'required',                      
            'num_colegiado' =>'required',
            'tipo_medico' =>'required',           
            'email' => 'required|max:250|unique:users,email,'.$medico->user->id,
            'password' => 'nullable|max:250|confirmed',
        ]);

        $medico->nombres = $request->nombres;
        $medico->apellidos = $request->apellidos;
        $medico->direccion = $request->direccion;
        $medico->telefono = $request->telefono;
        $medico->ciudad = $request->ciudad;
        $medico->cedula = $request->cedula;
        $medico->num_seguro_social = $request->num_seguro_social;               
        $medico->num_colegiado = $request->num_colegiado;
        $medico->tipo_medico = $request->tipo_medico;       
        $medico->save();
   
        $usuario = User::find($medico->user->id);
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;       
        if($request->filled('password')){
            $usuario->password = Hash::make($request->password);
        }       
        $usuario->save();

        return redirect()->route('admin.medicos.index')
            ->with('mensaje', 'Los datos del medico han sido actualizado de manera correcta')
            ->with('icono', 'success');
    }

    public function confirmDelete($id){

        $medico = Medico::with('user')->findOrFail($id);
        return view('admin.medicos.delete',compact('medico'));
    }

    public function destroy($id)
    {
        $medico = medico::find($id);

        //Eliminar usuario 
        $user = $medico->user;
        $user->delete();

        //Eliminar medico
        $medico->delete();

        return redirect()->route('admin.medicos.index')
            ->with('mensaje', 'Los datos del medico han sido eliminados de manera correcta')
            ->with('icono', 'success');
    }
}
