<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
    public function laboratorio() {
        return $this->belongsTo('App\Laboratorio', 'idLaboratorio');
    }

    public function sala() {
        return $this->belongsTo('App\Sala', 'idSala');
    }
}
