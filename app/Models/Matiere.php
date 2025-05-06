<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_matiere';
    protected $fillable = ['nom_matiere'];

    // Relation Many-to-Many avec Classe
    public function classes()
    {
        return $this->belongsToMany(Classe::class, 'rattacher', 'id_matiere', 'id_classe');
    }
}
