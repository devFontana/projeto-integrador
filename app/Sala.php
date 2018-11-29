<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    //

    public function localizacao() {
        return $this->belongsTo('App\Localizacao','idLocalizacao');
    }

    public function locacao() {
        return $this->hasMany('App\Locacao');
    }
}
