<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $fillable =['name', 'email', 'password'];
    protected $table='users';

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }
    
}
