<?php

namespace Intensivettt\Http\Controllers;

use Illuminate\Http\Request;
use Intensivettt\Receta;
use Intensivettt\Insumo;
use Intensivettt\Medida;

class RecetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas =  Receta::latest()->paginate(10);
        return view('backadmin.recetas.index')
        ->with('recetas', $recetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insumos = Insumo::orderBy('nombre_insumo', 'ASC')->pluck('nombre_insumo', 'id');
        $medidas = Medida::orderBy('nombre_unidad', 'ASC')->pluck('nombre_unidad', 'id');
        return view('backadmin.recetas.create')
        ->with('insumos', $insumos)
        ->with('medidas', $medidas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
