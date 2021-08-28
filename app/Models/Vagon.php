<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vagon extends Model
{
    use HasFactory;
    protected $fillable=['nro_vagon', 'descripcion', 'capacidad', 'tren_id'];
    protected $table="vagon";
    public $timestamps=false;


    public function tren(){
        return $this->belongsTo('App\Models\Tren');
    }

    public function asiento(){
        return $this->hasMany('App\Models\Asiento');
    }
}
