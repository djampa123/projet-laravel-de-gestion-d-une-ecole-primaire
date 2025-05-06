<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $primaryKey = 'id_paiement';

    protected $fillable = ['tranche1', 'tranche2', 'tranche3', 'id_eleve'];

    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'id_eleve');
    }
}
