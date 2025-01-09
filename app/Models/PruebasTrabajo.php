<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PruebasTrabajo extends Model
{
    use HasFactory;
    protected $table = 'pruebas_trabajo';

    protected $fillable = ['id_trabajo_edificio', 'foto_url', 'size_widht', 'size_height'];

    public function trabajo()
    {
        return $this->belongsTo(TrabajoEdificio::class, 'id_trabajo_edificio');
    }
}
