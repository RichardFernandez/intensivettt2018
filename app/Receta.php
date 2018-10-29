<?php

namespace Intensivettt;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $fillable = ['nombre_receta', 'masotipo', 'imagen', 'video'];

    public function pasos(){
    	return $this->hasMany('Intensivettt\Pasos');
    }

    public function insumos(){
    	return $this->belongsToMany('Intensivettt\Insumo')->withPivot('cantidad', 'medida_id')->withTimestamps();
    }
}
