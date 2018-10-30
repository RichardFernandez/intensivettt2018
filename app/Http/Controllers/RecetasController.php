<?php

namespace Intensivettt\Http\Controllers;

use Illuminate\Http\Request;
use Intensivettt\Receta;
use Intensivettt\Insumo;
use Intensivettt\Medida;
use Intensivettt\Paso;

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

        // dd($request);

        if($request->file('imagen')){
            $file = $request->file('imagen');
            $name = 'receta_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/sisimages/recetas';
            $file->move($path, $name);
        }

        else{
           $name = '';
        }

        $receta = new Receta($request->all());
        $receta->imagen = $name;
        $receta->save();

        

        /*CAPTURO LOS INSUMOS EN LA TABLA PIVOT*/
          $manytomany = array();
          $insumos = $request->insumo_id;
          $cantidadInsumos = 0;

          /*Verifico cuales estan llenos*/
          foreach($insumos as $insumo){
              if(!empty($insumo))
                  $cantidadInsumos++;
          }

          /*Capturo insumos con su campos pivot*/
        
          for($i=0; $i < $cantidadInsumos; $i++){
           $manytomany[ $request->insumo_id[$i] ] = ['cantidad' => $request->cantidad[$i], 'medida_id' => $request->medida_id[$i]];
           
           }

           $receta->insumos()->sync($manytomany);

           /*Captura del proceso*/

               $pasos = $request->paso;

               $valores_no_vacios = 0;

               foreach($pasos as $paso) {
                 if(!empty($paso)) // Solo si no esta vacío y es un número (is_numeric)
                   $valores_no_vacios++;
               }
           

           for($i=0; $i <= $valores_no_vacios - 1; $i++){
           
           $metodologia = new Paso();

           $metodologia->paso = $request->paso[$i];
           $metodologia->receta()->associate($receta);
           $metodologia->save();

           }


        return redirect('recetas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
