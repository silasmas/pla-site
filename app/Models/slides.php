<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class slides extends Model
{
    use HasFactory;

    use HasTranslations;
    protected $guarded=[];
    protected $dates=['created_at','updated_at'];


    public $translatable = ['titresmall','titrebig','resume','textbtn'];
}
