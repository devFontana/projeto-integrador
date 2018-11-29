<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    public function localizacao() {
        return $this->belongsTo('App\Localizacao','idLocalizacao');
    }

    public function solicitacaoSoftware() {
        return $this->hasMany('App\SolicitacaoSoftware');
    }

    public function softwares() {
        return $this->belongsToMany('App\Software', 'idSoftware');
    }

    public function locacao() {
        return $this->hasMany('App\Locacao');
    }
}
