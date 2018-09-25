<?php

namespace Intensivettt\Http\Controllers;

use Illuminate\Http\Request;

use Intensivettt\Marcasuplemento;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marcasuplemento::latest()->paginate(10);

        return view('backadmin.marcas.index', ["marcas" => $marcas]);
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
        $marca = new Marcasuplemento;

        $marca->nombre_marca = $request->nombre_marca;

        if( $marca->save() ){
            return redirect("/marcas");
        }
        else{
            return redirect("/marcas");
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
        $marca = Marcasuplemento::find($id);
        $marcas = Marcasuplemento::latest()->paginate(10);

        return view('backadmin.marcas.index')
        ->with('marcaEdit', $marca)
        ->with('marcas', $marcas); 

  
}
    public function update(Request $request, $id)
    {
        $marca = Marcasuplemento::find($id);

        $marca->nombre_marca = $request->nombre_marca;

        $marca->save();

        // flash('Se actualizo con éxito el registro')->success();

         return redirect('/marcas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Marcasuplemento::destroy($id);

        return redirect('/marcas');
    }
}
