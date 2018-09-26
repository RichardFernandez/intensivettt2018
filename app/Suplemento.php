<?php

namespace Intensivettt;

use Illuminate\Database\Eloquent\Model;

class Suplemento extends Model
{
    protected $fillable = [
      "nombre_suplemento",
      "tipo_suplemento",
      "imagen",
      "marca"
    ];

    public function marcasuplemento(){
    	return $this->belongsTo('Intensivettt\Marcasuplemento', 'marca');
    }
}


