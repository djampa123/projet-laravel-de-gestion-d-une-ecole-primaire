<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    // Définir la table associée au modèle
    protected $table = 'eleves';

    // Spécifier la clé primaire si elle n'est pas 'id' (ici c'est 'id_eleve')
    protected $primaryKey = 'id_eleve';

    // Si vous ne souhaitez pas utiliser les timestamps (created_at et updated_at), vous pouvez définir ceci :
    public $timestamps = false;

    // Définir les attributs qui sont assignables en masse
    protected $fillable = [
        'id_eleve',
        'nom_eleve',
        'prenom_eleve',
        'date_naiss',
        'lieu_naiss',
        'nom_parent',
        'telephone_parent',
        'id_salle',
    ];

    // Définir une relation avec le modèle Salle (une salle peut avoir plusieurs élèves)
    public function salle()
    {
        return $this->belongsTo(Salle::class, 'id_salle', 'id_salle');
    }

    // Définir la relation avec le modèle Obtenir (un élève peut avoir plusieurs notes)
    public function obtenir()
    {
        return $this->hasMany(Obtenir::class, 'id_eleve', 'id_eleve');
    }
    // app/Models/Eleve.php
    public function avertissements() {
    return $this->hasMany(Avertissement::class, 'id_eleve');
    }
    public function paiements()
    {
    return $this->hasMany(Paiement::class, 'id_eleve');
    }


   
}