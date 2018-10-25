<?php

namespace Intensivettt;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $fillable = ['nombre_receta', 'masotipo', 'imagen', 'video'];

    public function pasos(){
    	return $this->hasMany('Pharma\Pasos');
    }

    public function insumos(){
    	return $this->belongsToMany('Pharma\Insumo')->withPivot('cantidad', 'medida_id')->withTimestamps();
    }
}
