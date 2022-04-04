<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class about extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $dates=['created_at','updated_at'];

    use HasTranslations;

    public $translatable = ['quisommenous','titrecabinet','contenu',
    'slogant','resume','b1','r1','temps','b2','r2','b3','r3','b4','r4','b5','r5',
    'titreBeneficesmall','titrebigbenefice','titreNosValeurs','extrait'];
}
