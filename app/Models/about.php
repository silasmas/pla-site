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

    public $translatable = ['titre1', 'detail', 'titre2', 'temps',
        'h1', 'h2', 'detail2', 'detail3', 'quisommenous', 'titrecabinet', 'contenu', 'titreNosValeurs', 'slogant'];
}
