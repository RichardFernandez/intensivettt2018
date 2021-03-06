<?php

namespace Intensivettt\Http\Controllers;

use Illuminate\Http\Request;

use Intensivettt\Frase;

class FrasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frases = Frase::latest()->paginate(10);

        return view('backadmin.frases.index', ["frases" => $frases]);
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
         $frase = new Frase;

         $frase->frase = $request->frase;

         if($frase->save()){
            return redirect('/frases');
         }
         else{
            return redirect('/frases');
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
        $frase = Frase::find($id);
        $frases = Frase::latest()->paginate(10);

        return view('backadmin.frases.index')
        ->with('fraseEdit', $frase)
        ->with('frases', $frases); 
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
        $frase = Frase::find($id);

        $frase->frase = $request->frase;

        $frase->save();

        // flash('Se actualizo con éxito el registro')->success();

         return redirect('/frases');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Frase::destroy($id);

        return redirect('/frases');
    }
}
