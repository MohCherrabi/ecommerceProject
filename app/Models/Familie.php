<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Familie extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $guarded = ['id', 'created_at', 'updated_at','detected_at'];
    // protected $fillable = ['label', 'image'];
    public function sub_families(){
        return $this->hasMany(SubFamilie::class);
    }
}
