<?php

namespace Intensivettt\Http\Controllers;

use Illuminate\Http\Request;
use Intensivettt\Pregunta;

class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas = Pregunta::latest()->paginate(10);

        return view('backadmin.preguntas.index', ["preguntas" => $preguntas]); 
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
        $pregunta = new Pregunta($request->all());

        if( $pregunta->save()){
            return redirect("/preguntas");
        }
        else{
            return redirect("/preguntas");
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
        $pregunta = Pregunta::find($id);
        $preguntas = Pregunta::latest()->paginate(10);

        return view('backadmin.preguntas.index')
        ->with('preguntaEdit', $pregunta)
        ->with('preguntas', $preguntas);
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
        $pregunta = Pregunta::find($id);

        $pregunta = fill($request->all());

        $Pregunta->update();

        // flash('Se actualizo con éxito el registro')->success();

         return redirect('/preguntas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pregunta::destroy($id);

        return redirect('/preguntas');
    }
}
