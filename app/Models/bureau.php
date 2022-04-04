<?php

namespace App\Models;

use App\Models\avocat;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bureau extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $dates=['created_at','updated_at'];

    use HasTranslations;
    //protected $with=['avocat'];
    public $translatable = ['titre','adresse','physique','detail'];

    public function avocat(){
        return $this->belongsToMany(avocat::class,'avocat_bureaus')->withPivot('bureau_id','avocat_id')->withTimestamps();
    }
}
