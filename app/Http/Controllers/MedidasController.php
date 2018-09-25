<?php

namespace Intensivettt\Http\Controllers;

use Illuminate\Http\Request;

use Intensivettt\Medida;

class MedidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*Obtenemos todos los registros de la base de datos*/
        $medidas = Medida::latest()->paginate(10);

        // Desplegamos los resultados en la vista.

        return view("backadmin.medidas.index", ["medidas" => $medidas] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unidad = new Medida;

        $unidad->nombre_unidad = $request->nombre_unidad;

        if($unidad->save()){
            return redirect("/medidas");
        }
        else{
            return redirect("/medidas");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medida = Medida::find($id);
        $medidas = Medida::latest()->paginate(10);

        return view('backadmin.medidas.index')
        ->with('unidadEdit', $medida)
        ->with('medidas', $medidas); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $unidad = Medida::find($id);

        $unidad->nombre_unidad = $request->nombre_unidad;

        $unidad->save();

        // flash('Se actualizo con éxito el registro')->success();

         return redirect('/medidas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medida::destroy($id);

        return redirect('/marcas');
    }
}
