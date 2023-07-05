<?php

namespace App\Models;

use App\Models\bureau;
use App\Models\fonction;
use App\Models\publication;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class avocat extends Model
{
    use HasFactory;

    use HasTranslations;
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];

    protected $with = ['publication', 'bureau', 'fonction'];
    public $translatable = ['biographie'];

    public function publication()
    {
        return $this->hasMany(publication::class)->with('categorie');
    }
    public function bureau()
    {
        return $this->belongsToMany(bureau::class, 'avocat_bureaus');
    }
    public function fonction()
    {
        return $this->belongsTo(fonction::class);
    }
}
