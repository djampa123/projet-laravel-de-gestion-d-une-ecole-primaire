<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trimestre extends Model
{
    // Définir la table associée au modèle
    protected $table = 'trimestres';

    // Spécifier la clé primaire si elle n'est pas 'id' (ici c'est 'id_trimestre')
    protected $primaryKey = 'id_trimestre';

    // Si vous ne souhaitez pas utiliser les timestamps (created_at et updated_at), vous pouvez définir ceci :
    public $timestamps = false;

    // Définir les attributs qui sont assignables en masse
    protected $fillable = [
        'id_trimestre',
        'nom_trimestre',
        'sequence',
    ];

    // Optionnel: Vous pouvez ajouter des méthodes pour définir des relations ici si elles existent
}
