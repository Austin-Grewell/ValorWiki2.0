<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    protected $fillable = [
        'itemName',
        'agent',
        'map',
        'skin',
        'weapon',
        'about',
        'abilityOne',
        'abilityTwo',
        'abilityThree',
        'abilityFour'
    ];

    protected $casts = [
        'agent' => 'boolean',
        'map' => 'boolean',
        'skin' => 'boolean',
        'weapon' => 'boolean'
    ];
}
