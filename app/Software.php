<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    public function solicitacaoSoftware() {
        return $this->hasMany('App\SolicitacaoSoftware');
    }

    public function laboratorios() {
        return $this->belongsToMany('App\Laboratorios', 'idLaboratorios');
    }
}
