<?php

namespace Intensivettt\Http\Controllers;

use Illuminate\Http\Request;

use Intensivettt\Suplemento;

use Intensivettt\Marcasuplemento;

use Intensivettt\Image;

class SuplementosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suplementos = Suplemento::with('marcasuplemento')->latest()->paginate(10);

        return view('backadmin.suplementos.index', compact('suplementos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marcasuplemento::orderBy('nombre_marca', 'ASC')->pluck('nombre_marca', 'id');
        return view('backadmin.suplementos.create')->with('marcas', $marcas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //manipulacion de imagenes
        if($request->file('imagen')){
            $file = $request->file('imagen');
            $name = 'suplemento_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/sisimages/suplementos';
            $file->move($path, $name);
        }

        $suplemento = New Suplemento($request->all());
        $suplemento->imagen = $name;
        $suplemento->save();

        return redirect('suplementos');

        

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
        Suplemento::destroy($id);

        return redirect('/suplementos');
    }
}
