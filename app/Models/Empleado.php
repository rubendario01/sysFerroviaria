<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable=['nombre', 'apellidos', 'telefono', 'direccion', 'email'];
    protected $table="empleado";
    public $timestamps=false;

    
}
