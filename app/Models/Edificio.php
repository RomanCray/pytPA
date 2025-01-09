<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Edificio extends Model
{
    use HasFactory;

    protected $table= 'edificios';

    protected $fillable = ['id_proyecto', 'nombre_edificio'];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }

    public function trabajos()
    {
        return $this->hasMany(TrabajoEdificio::class, 'id_edificio');
    }
}
