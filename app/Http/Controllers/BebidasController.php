<?php

namespace Intensivettt\Http\Controllers;

use Illuminate\Http\Request;
use Intensivettt\Bebida;

class BebidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bebidas = Bebida::latest()->paginate(10);

        return view('backadmin.bebidas.index', ["bebidas" => $bebidas]); 
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
        $bebida = new Bebida;

        $bebida->nombre_bebida = $request->nombre_bebida;

        if( $bebida->save()){
            return redirect("/bebidas");
        }
        else{
            return redirect("/bebidas");
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
        $bebida = Bebida::find($id);
        $bebidas = Bebida::latest()->paginate(10);

        return view('backadmin.bebidas.index')
        ->with('bebidaEdit', $bebida)
        ->with('bebidas', $bebidas);
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
        $bebida = Bebida::find($id);

        $bebida->nombre_bebida = $request->nombre_bebida;

        $bebida->save();

        // flash('Se actualizo con éxito el registro')->success();

         return redirect('/bebidas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bebida::destroy($id);

        return redirect('/bebidas');
    }
}
