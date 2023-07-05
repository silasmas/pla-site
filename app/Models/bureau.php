<?php

namespace App\Models;

use App\Models\avocat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class bureau extends Model
{
    use HasFactory;

    use HasTranslations;
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];

    //protected $with=['avocat'];
    public $translatable = ['titre', 'adresse', 'physique', 'detail'];

    public function avocat()
    {
        return $this->belongsToMany(avocat::class, 'avocat_bureaus')->withPivot('bureau_id', 'avocat_id')->withTimestamps();
    }
}
