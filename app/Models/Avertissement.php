<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avertissement extends Model
{
    // Nom de la table si différent de la convention (facultatif ici)
    protected $table = 'avertissements';

    // Clé primaire personnalisée
    protected $primaryKey = 'id_avertissement';

    // Pas de timestamps (si vous n'avez pas created_at / updated_at)
    public $timestamps = false;

    // Champs que l'on peut remplir via un formulaire (mass assignment)
    protected $fillable = [
        'description',
        'date_avertissement',
        'id_eleve',
    ];

    // Relation : un avertissement appartient à un élève
    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'id_eleve');
    }
}
