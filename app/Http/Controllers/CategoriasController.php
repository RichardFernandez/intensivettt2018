<?php

namespace Intensivettt\Http\Controllers;

use Illuminate\Http\Request;

use Intensivettt\Catvideo;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Catvideo::latest()->paginate(10);
        return view('backadmin.catvideos.index', ["categorias" => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
              'nombre_categoria' => ['required','max:80']],
              [
                
              'nombre_categoria.required' => "Por favor captura la categoria.",
              'nombre_categoria.max' => "No puedes superar los 80 caracteres."

        ]);

        return view('backadmin.catvideos.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Catvideo;

        $categoria->nombre_categoria = $request->nombre_categoria;

         if( $categoria->save()){
            return redirect("/categorias");
         }else{
            return redirect("/categorias");
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
          $categoria = Catvideo::find($id);
          $categorias = Catvideo::latest()->paginate(10);

          return view('backadmin.catvideos.index')
          ->with('categoriaEdit', $categoria)
          ->with('categorias', $categorias);
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
        $categoria = Catvideo::find($id);

        $categoria->nombre_categoria = $request->nombre_categoria;

        $categoria->save();

        // flash('Se actualizo con éxito el registro')->success();

         return redirect('/categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Catvideo::destroy($id);

        return redirect('/categorias');

    }
}
