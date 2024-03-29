<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table='cliente';
    public $timestamps=false;
    protected $fillable=['nombres', 'apellidos', 'telefono', 'user_id']; 

    public function user(){
        return $this->hasMany('App\Models\User');
    }
}
