<?php

namespace App\Models;

use App\Models\avocat;
use App\Models\bureau;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class avocatBureau extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $dates=['created_at','updated_at'];

    public function avocat(){
        return $this->belongsTo(avocat::class);
    }

    public function bureau(){
        return $this->belongsTo(bureau::class);
    }
}
