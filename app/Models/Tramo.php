<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramo extends Model
{
    use HasFactory;
    protected $table="tramo";
    public $timestamps=false;
    protected $fillable=['nombre', 'longitud', 'ruta_id'];

    public function ruta(){
        return $this->belongsTo('App\Models\Ruta');
    }
}
