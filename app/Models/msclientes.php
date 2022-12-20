<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class msclientes extends Model
{
    use HasFactory;
    protected $table = 'msclientes';
    protected $fillable = [
        'nombre',
        'mail',
        'telefono',
        'mensaje',
        'mail_enviado'
    ];
}
