<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Medico;
use App\Models\Consultorio;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicos = Medico::all();
        $horarios = Horario::with('medico','consultorio')->get();
        return view('admin.horarios.index', compact('horarios','medicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicos = Medico::all(); 
        $consultorios= Consultorio::all();
        return view('admin.horarios.create',compact('medicos','consultorios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dia' => 'required',
            'hora_inicio' =>'required',
            'hora_fin' => 'required',         
            'medico_id' => 'required|exists:medicos,id',     
            'consultorio_id' => 'required|exists:consultorios,id',                    
        ]);


        Horario::create($request->all());

        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'El registro del horario fue exitoso')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $horario = Horario::findOrFail($id);
        return view('admin.horarios.show',compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicos = Medico::all();
        $consultorios = Consultorio::all();
        $horario = Horario::findOrFail($id);
        return view('admin.horarios.edit',compact('horario','medicos','consultorios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    $horario = Horario::findOrFail($id);

    $request->validate([
        'dia' => 'required',
        'hora_inicio' => 'required',
        'hora_fin' => 'required',
        'medico_id' => 'nullable|exists:medicos,id',
        'consultorio_id' => 'nullable|exists:consultorios,id',
    ]);

    $horario->dia = $request->dia;
    $horario->hora_inicio = $request->hora_inicio;
    $horario->hora_fin = $request->hora_fin;
    $horario->medico_id = $request->medico_id;
    $horario->consultorio_id = $request->consultorio_id;

    $horario->save();


    return redirect()->route('admin.horarios.index')
        ->with('mensaje', 'Los datos del horario han sido actualizado de manera correcta')
        ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        //
    }
}
