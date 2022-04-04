<?php

namespace App\Models;

use App\Models\publication;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class categorie extends Model 
{
    use HasFactory;

    protected $guarded=[];
    protected $dates=['created_at','updated_at'];

    use HasTranslations;

    public $translatable = ['nom','biographie'];
    public function publication(){
        return $this->hasMany(publication::class);
    }
	
}
