<?php

namespace App\Models;
use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use SoftDeletes;
    
    use HasFactory;

    public $table = 'projects';

    protected $appends = [
        'files',
    ];

    public const ETAT_SELECT = [
        'en pause' => 'en pause',
        'en cours' => 'en cours',
        'fait'    => 'fait',
    ];


    protected $fillable = [
        'nom_projet',
        'budget',
        'datedebut',
        'datefin',
        'chef_dequipe_id',
        'etatprojet',
        'commantaire',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function materials()
    {
        return $this->belongsToMany(Material::class,'material_project');
    }
    public function chef_dequipe()
    {
        return $this->belongsTo(User::class, 'chef_dequipe_id');
    }
   
}