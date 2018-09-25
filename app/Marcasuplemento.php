<?php

namespace Intensivettt;

use Illuminate\Database\Eloquent\Model;

class Marcasuplemento extends Model
{
    protected $fillable = [
        "nombre_marca",
    ];

    public function suplementos(){
    	return $this->hasMany('Intensivettt\Suplemento');
    }
}
