<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salle extends Model
{
    use HasFactory;

    protected $table = 'salles';
    protected $primaryKey = 'id_salle';
    public $timestamps = false;

    protected $fillable = [
        'nom_salle',
        'emplacement',
        'capacite'
    ];

    // Relation avec les élèves
    public function eleves()
    {
        return $this->hasMany(Eleve::class, 'id_salle');
    }
}
