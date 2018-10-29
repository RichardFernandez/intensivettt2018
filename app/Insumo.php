<?php

namespace Intensivettt;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $fillable = ['nombre_insumo', 'tipo'];

    public function recetas(){
    	return $this->belongToMany('Intensivettt\Receta')->withPivot('cantidad', 'medida_id')->withTimestamps();
    }
}
