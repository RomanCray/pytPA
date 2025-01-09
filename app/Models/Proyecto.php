<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyectos';

    protected $fillable = ['nombre_proyecto', 'titulo_proyecto', 'status'];

    public function edificios()
    {
        return $this->hasMany(Edificio::class, 'id_proyecto');
    }
}
