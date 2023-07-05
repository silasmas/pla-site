<?php

namespace App\Models;

use App\Models\avocat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class fonction extends Model
{
    use HasFactory;

    use HasTranslations;
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];


    public $translatable = ['fonction'];
    public function avocat()
    {
        return $this->hasMany(avocat::class);
    }
}
