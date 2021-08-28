<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tren extends Model
{
    use HasFactory;
    protected $table="tren";
    public $timestamps= false;
    protected $fillable=['codigo', 'nombre', 'descripcion', 'modelo', 'capacidad'];

    public function vagon(){
        return $this->hasMany('App\Models\Vagon');
    }

    public function viaje(){
        return $this->hasMany('App\Models\Viaje');
    }
}
