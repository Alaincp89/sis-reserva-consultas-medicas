<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\User;
use App\Models\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::with('user')->get();
        return view('admin.pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        $medicos = Medico::all(); 
        return view('admin.pacientes.create', compact('medicos'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);

        Log::info('Datos recibidos:', $request->all()); 

        $request->validate([
            'nombres' => 'required',
            'apellidos' =>'required',
            'direccion' => 'required',
            'telefono' =>'required',
            'codigo_postal' =>'required',
            'cedula' =>'required|unique:pacientes',
            'num_seguro_social' =>'required',            
            'medico_id' => 'required|exists:medicos,id',                       
            'email' => 'required|max:250|unique:users',
            'password' => 'required|max:250|confirmed',
        ]);

        Log::info('Datos recibidos:', $request->all());

        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        $paciente = new Paciente();
        $paciente->user_id = $usuario->id;
        $paciente->nombres = $request->nombres;
        $paciente->apellidos = $request->apellidos;
        $paciente->direccion = $request->direccion;
        $paciente->telefono = $request->telefono;
        $paciente->codigo_postal = $request->codigo_postal;
        $paciente->cedula = $request->cedula;
        $paciente->num_seguro_social = $request->num_seguro_social;       
        $paciente->medico_id = $request->medico_id;
               
        $paciente->save();
   
        return redirect()->route('admin.pacientes.index')
            ->with('mensaje', 'El registro del paciente fue exitoso')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paciente = Paciente::with('user')->findOrFail($id);
        return view('admin.pacientes.show',compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicos = Medico::all();
        $paciente = Paciente::with('user')->findOrFail($id);
        return view('admin.pacientes.edit',compact('paciente','medicos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    $paciente = Paciente::findOrFail($id);

    Log::info('Datos recibidos: ', $request->all());

    $request->validate([
        'nombres' => 'required',
        'apellidos' => 'required',
        'direccion' => 'required',
        'telefono' => 'required',
        'codigo_postal' => 'required',
        'cedula' => 'required|unique:pacientes,cedula,' . $paciente->id,
        'num_seguro_social' => 'required',
        'medico_id' => 'nullable|exists:medicos,id',
        'email' => 'required|max:250|unique:users,email,' . $paciente->user->id,
        'password' => 'nullable|max:250|confirmed',
    ]);

    $paciente->nombres = $request->nombres;
    $paciente->apellidos = $request->apellidos;
    $paciente->direccion = $request->direccion;
    $paciente->telefono = $request->telefono;
    $paciente->codigo_postal = $request->codigo_postal;
    $paciente->cedula = $request->cedula;
    $paciente->num_seguro_social = $request->num_seguro_social; 
    $paciente->medico_id = $request->medico_id;

    if ($paciente->save()) {
        Log::info('Datos del paciente actualizados correctamente.');
    }

    $usuario = User::findOrFail($paciente->user->id);
    $usuario->name = $request->nombres;
    $usuario->email = $request->email;
    if ($request->filled('password')) {
        $usuario->password = Hash::make($request->password);
    }

    if ($usuario->save()) {
        Log::info('Datos del usuario actualizados correctamente.');
    }

    return redirect()->route('admin.pacientes.index')
        ->with('mensaje', 'Los datos del paciente han sido actualizado de manera correcta')
        ->with('icono', 'success');
    }


    public function confirmDelete($id){

        $paciente = Paciente::with('user')->findOrFail($id);
        return view('admin.pacientes.delete',compact('paciente'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id);

        //Eliminar usuario 
        $user = $paciente->user;
        $user->delete();

        //Eliminar paciente
        $paciente->delete();

        return redirect()->route('admin.pacientes.index')
            ->with('mensaje', 'Los datos del paciente se han sido eliminado de manera correcta')
            ->with('icono', 'success');
    }
    
}
