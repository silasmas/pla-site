<?php

namespace App\Models;

use App\Models\expertise;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class sorte extends Model
{
    use HasFactory;

    use HasTranslations;
    protected $guarded=[];
    protected $dates=['created_at','updated_at'];

   // public $with = ['expertise'];
    public $translatable = ['nom'];

    // public function expertise(){
    //     return $this->hasMany(expertise::class);
    // }
}
