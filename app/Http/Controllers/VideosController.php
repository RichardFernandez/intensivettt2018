<?php

namespace Intensivettt\Http\Controllers;

use Illuminate\Http\Request;
use Intensivettt\Video;
use Intensivettt\Catvideo;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::with('Categoria')->latest()->paginate(10);
        return view('backadmin.videos.index')->with('videos', $videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Catvideo::orderBy('nombre_categoria', 'ASC')->pluck('nombre_categoria', 'id');
        return view('backadmin.videos.create')->with('categorias', $categorias);
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
            $name = 'video_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/sisimages/videos';
            $file->move($path, $name);
        }

        $video = New Video($request->all());
        $video->imagen = $name;
        $video->save();

        return redirect('videos');
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
        $categorias = Catvideo::orderBy('nombre_categoria', 'ASC')->pluck('nombre_categoria', 'id');
        $video = Video::with('categoria')->find($id);
        return view('backadmin.videos.edit')
        ->with('video', $video)
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
        if($request->file('imagen')){
            $file = $request->file('imagen');
            $name = 'video_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/sisimages/videos';
            $file->move($path, $name);

            $video = Video::find($id);
            $video->fill($request->all());
            $video->imagen = $name;
            // dd($medico);
           
        }
        else{

            $video = Video::find($id);
            $video->fill($request->all());
        }
        
        $video->update();
        return redirect('/videos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Video::destroy($id);

        return redirect('/videos');
    }
}
