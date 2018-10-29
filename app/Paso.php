<?php

namespace Intensivettt;

use Illuminate\Database\Eloquent\Model;

class Paso extends Model
{
    protected $fillable = ['paso', 'receta_id'];

    public function receta(){
    	return $this->belongsTo('Intensivettt\Receta');
    }
}
