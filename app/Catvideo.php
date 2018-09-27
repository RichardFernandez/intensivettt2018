<?php

namespace Intensivettt;

use Illuminate\Database\Eloquent\Model;

class Catvideo extends Model
{
    protected $fillable = [
        'nombre_categoria',
    ];

    public function videos(){
    	return $this->hasMany('Intensivettt\Video');
    }
}
