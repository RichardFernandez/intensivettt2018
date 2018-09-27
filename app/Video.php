<?php

namespace Intensivettt;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['nombre_video', 'url', 'imagen', 'categoria_id' ];

    public function categoria(){
    	return $this->belongsTo('Intensivettt\Catvideo');
    }
}
