<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitacaoSoftware extends Model
{
    //

    public function user() {
        return $this->belongsTo('App\User', 'idUsuario');
    }

    public function software() {
        return $this->belongsTo('App\Software', 'idSoftware');
    }

    public function laboratorio() {
        return $this->belongsTo('App\Laboratorio', 'idLaboratorio');
    }
}
