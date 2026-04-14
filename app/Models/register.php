<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormularioMetro extends Model
{
protected $fillable = [
    'name',
    'documento',
    'email',
    'password',
    'remember_token',
    'rol'
];
}