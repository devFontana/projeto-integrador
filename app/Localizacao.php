<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
    protected $table = 'localizacoes';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function sala() {
        return $this->hasMany('App\Sala');
    }
    
    public function laboratorio() {
        return $this->hasMany('App\Laboratorio');
    }
}
