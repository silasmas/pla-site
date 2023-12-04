<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class about extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];

    public $translatable = ['titre1', 'detail', 'titre2', 'temps','titreBeneficesmall','resume','b1','r1','b2','r2','b3','r3','b4','r4','b5','r5',
        'h1', 'h2', 'detail2', 'detail3', 'quisommenous', 'titrecabinet', 'contenu', 'titreNosValeurs', 'slogant','extrait'];
}
