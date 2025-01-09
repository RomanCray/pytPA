<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SettingsEdificio extends Model
{
    use HasFactory;

    protected $table = 'settings_edificio';

    protected $fillable = ['status', 'edificio_name'];
}
