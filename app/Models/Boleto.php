<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    use HasFactory;
    protected $fillable=['nro_boleto'];
    protected $table="boleto";
    public $timestamps=false;

    public function notaVenta(){
        return $this->belongsTo('App\Models\Venta');
    }
}
