<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tache extends Model
{
    
    use SoftDeletes;
    use HasFactory;

    public const ETAT_SELECT = [
        'enpause' => 'en pause',
        'encours' => 'en cours',
        'fait'    => 'fait',
    ];

    protected $fillable = [
        'nom_tache',
        'etat',
        'dgree_priorite',
        'date_debut',
        'date_fin',
        'nom_projet_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function participants()
    {
        return $this->belongsToMany(User::class);
    }
    public function nom_projet()
    {
        return $this->belongsTo(Project::class, 'nom_projet_id');
    }
}
