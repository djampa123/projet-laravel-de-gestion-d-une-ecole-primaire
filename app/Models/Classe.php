<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $table = 'classes';
    protected $primaryKey = 'id_classe';
    protected $fillable = ['nom_classe', 'id_section'];

    // Relation Many-to-Many avec Matiere
    public function matieres()
    {
        return $this->belongsToMany(Matiere::class, 'rattacher', 'id_classe', 'id_matiere');
    }

    // Relation One-to-Many inverse avec Section
    public function section()
    {
        return $this->belongsTo(section::class, 'id_section', 'id');
    }
   

    // Définir la relation many-to-many avec les enseignants
    public function enseignants()
    {
    return $this->hasMany(Enseignant::class, 'classe_id', 'id_classe');
    }

}