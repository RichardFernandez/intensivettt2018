<?php

namespace Intensivettt\Http\Controllers;

use Illuminate\Http\Request;
use Intensivettt\Snack;

class SnacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $snacks = Snack::latest()->paginate(10);
        return view('backadmin.snacks.index', ["snacks" => $snacks]);
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
        $snack = new Snack;
        $snack->nombre_snack = $request->nombre_snack;

        if( $snack->save()){
            return redirect("/snacks");
        }
        else{
            return redirect("/snacks");
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
        $snack = Snacks::find($id);
        $snacks = Snacks::latest()->paginate(10);

        return view('backadmin.snacks.index')
        ->with('snackEdit', $snack)
        ->with('snacks', $snacks);  
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
        $snack = Snack::find($id);

        $snack->nombre_snack = $request->nombre_snack;

        $snack->save();

        // flash('Se actualizo con éxito el registro')->success();

         return redirect('/snacks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Snack::destroy($id);

        return redirect('/snacks');

    }
}
