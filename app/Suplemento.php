<?php

namespace Intensivettt;

use Illuminate\Database\Eloquent\Model;

class Suplemento extends Model
{
    protected $filable = [
      "nombre_suplemento",
      "tipo_suplemento",
      "categoria",
    ];

    public function marcasuplemento(){
    	return $this->belongsTo('Intensivettt\Marcasuplemento');
    }
}


