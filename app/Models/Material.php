<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'materials';

 

    protected $fillable = [
        'nom_material',
        'type_marterial',
        'cout',
        'date_achat',
        'etat',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    
    public function nom_projets()
    {
        return $this->belongsToMany(Project::class,'material_project');
    }
}
