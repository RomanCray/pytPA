<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrabajoEdificio extends Model
{
    use HasFactory;

    protected $table = 'trabajo_edificios';

    protected $fillable = ['id_edificio', 'fecha_inicio', 'fecha_fin', 'descripcion', 'material', 'titulo_trabajo'];

    public function edificio()
    {
        return $this->belongsTo(Edificio::class, 'id_edificio');
    }

    public function fotos()
    {
        return $this->hasMany(PruebasTrabajo::class, 'id_trabajo_edificio');
    }
}
