<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empresas'] = Empresa::paginate(5);
        return view ('empresa.index', $datos );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosEmpresa = request()->all();
        $campos=[
            'NombreCompleto'=>'required|string|max:100',
            'NombreCorto'=>'required|string|max:50',
            'TipoSociedad'=>'required|string|max:50',
            'Direccion'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Socios'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);


        $datosEmpresa = request()->except('_token');
        Empresa::insert($datosEmpresa);

        //return response()->json($datosEmpresa);
        return redirect('empresa')->with('mensaje',' Registro realizado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $empresa = Empresa::findOrFail($id);
        return view ('empresa.edit', compact('empresa'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosEmpresa = request()->except(['_token', '_method']);
        Empresa::where('id','=',$id)->update($datosEmpresa);

        $empresa = Empresa::findOrFail($id);
        return view ('empresa.edit', compact('empresa'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empresa::destroy($id);

        return redirect('empresa')->with('mensaje','Empresa eliminda existosamente.');

    }
}
