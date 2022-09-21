<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form extends Model
{
    use HasFactory;

    protected $fillable= [
        'document',
        'documentRegistry',
        'name',
        'date',
        'deathcover',
        'inactive',
        'created_user_id'
    ];
}
