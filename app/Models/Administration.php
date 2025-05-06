<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    use HasFactory;
    protected $table = 'administrations';
    protected $primaryKey = 'id_administration';
    public $timestamps = true;
    protected $fillable = ['nom_personnel', 'profession'];

    public function enseignants()
    {
        return $this->hasMany(Enseignant::class, 'id_administration');
    }
}
