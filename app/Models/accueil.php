<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class accueil extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];

    public $translatable = ['textsuivre', 'adresse', 'telphone', 'txtfooter',
        't1Team', 't2Team', 't1Pub', 't2Pub', 'titreTeam', 'descriptionTeam', 'quisommenous', 'titrecabinet', 'contenu'];
}
