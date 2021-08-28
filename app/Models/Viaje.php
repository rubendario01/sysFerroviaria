<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    use HasFactory;
    protected $fillable=['fecha', 'horario', 'origen', 'destino', 'precio', 'tren_id', 'ruta_id'];
    protected $table="viaje";
    public $timestamps=false;

    public function ruta(){
        return $this->belongsTo('App\Models\Ruta');
    }

    public function tren(){
        return $this->belongsTo('App\Models\Tren');
    }
}
