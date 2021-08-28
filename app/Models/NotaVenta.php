<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaVenta extends Model
{
    use HasFactory;
    protected $fillable=['fecha', 'monto'];
    protected $table="venta";
    public $timestamps=false;

    public function boleto(){
        return $this->hasMany('App\Models\Boleto');
    }
}
