<?php

namespace App\Models;

use App\Models\User;
use App\Models\avocat;
use App\Models\categorie;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class publication extends Model
{
    use HasFactory;

    use HasTranslations;
    protected $guarded=[];
    protected $dates=['created_at','updated_at'];


   // public $with = ['avocat','categorie','user'];
    public $translatable = ['titre','soustitre','contenu'];

    public function avocat(){
        return $this->belongsTo(avocat::class);
    }
    public function categorie(){
        return $this->belongsTo(categorie::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
