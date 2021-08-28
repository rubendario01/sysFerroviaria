<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;
    protected $table="ruta";
    public $timestamps=false;
    protected $fillable=['nombre', 'longitud'];

    public function tramo(){
        return $this->hasMany('App\Models\Tramo');
    }

    public function viaje(){
        return $this->hasMany('App\Models\Viaje');
    }
}
