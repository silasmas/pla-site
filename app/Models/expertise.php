<?php

namespace App\Models;


use App\Models\sorte;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class expertise extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $guarded=[];
    protected $dates=['created_at','updated_at'];

   // public $with = ['sor'];
    public $translatable = ['titre1','titre2','contenu'];
    // public function sor(){
    //     return $this->belongsTo(sorte::class);
    // }

}
