<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obtenir extends Model
{
    use HasFactory;

    protected $table = 'obtenir';
    public $incrementing = false;
    protected $primaryKey = ['id_matiere', 'id_trimestre', 'id_eleve', 'id_classe']; // Clé primaire composite
    public $timestamps = true;

    protected $fillable = [
        'id_matiere',
        'id_trimestre',
        'id_eleve',
        'id_classe',
        'note',
        'date',
    ];

    // Relations avec les autres modèles
    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'id_eleve', 'id_eleve');
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'id_matiere', 'id_matiere');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'id_classe', 'id_classe');
    }

    public function trimestre()
    {
        return $this->belongsTo(Trimestre::class, 'id_trimestre', 'id_trimestre');
    }
}