<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    use HasFactory;

    protected $table = 'sections'; // Nom de la table dans la base de données
    protected $primaryKey = 'id_section'; // Clé primaire de la table
    public $timestamps = false; // Désactive les timestamps (created_at, updated_at)

    protected $fillable = [
        'nom_section',
    ];

    // Relation One-to-Many avec Classe
    public function classes()
    {
        return $this->hasMany(Classe::class, 'id_section', 'id_section');
    }
}
