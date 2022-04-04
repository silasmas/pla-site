<?php

namespace App\Models;

use App\Models\avocat;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class fonction extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $dates=['created_at','updated_at'];

    use HasTranslations;

    public $translatable = ['fonction'];
    public function avocat(){
        return $this->hasMany(avocat::class);
    }
}
