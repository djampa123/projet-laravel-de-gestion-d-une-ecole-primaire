<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_eleve';
    protected $fillable = [
        'nom', 'prenom', 'date_naissance', 'lieu_naissance',
        'section', 'nom_parent', 'tel_parent', 'image',
        'id_salle', 'id_classe'
    ];

    // Relation avec Classe
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'id_classe');
    }

    // Relation avec Salle
    public function Salle()
    {
    return $this->belongsTo(Salle::class, 'id_salle');
    }

}
