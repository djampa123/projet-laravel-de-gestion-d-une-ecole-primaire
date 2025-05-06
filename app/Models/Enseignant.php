<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;
    protected $table = 'enseignants';
    // ✅ Ajoute 'classe_id' ici pour qu’il soit insérable
    protected $fillable = ['nom_enseignant', 'classe_id'];

    // ✅ Relation correcte : Un enseignant appartient à UNE classe
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id', 'id_classe');
    }
    
}
