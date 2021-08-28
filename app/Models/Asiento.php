<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
    use HasFactory;
    protected $table="asiento";
    protected $fillable=['nro_asiento', 'descripcion', 'vagon_id'];
    public $timestamps=false;

    public function vagon(){
        return $this->belongsTo('App\Models\Vagon');
    }

}
