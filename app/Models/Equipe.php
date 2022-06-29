<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipe extends Model
{
    protected $table = 'equipes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nomequipe', 
        'nombrequipe',
        'chefequipe_id',
        'created_at',
        'updated_at',
        'deleted_at',
];
public function chefequipe()
{
    return $this->belongsTo(User::class, 'chefequipe_id');
}

public function membres()
{
    return $this->belongsToMany(User::class);
}

public function nom_projets()
{
    return $this->belongsToMany(Project::class);
}
}
