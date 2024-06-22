<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubFamilie extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $guarded = ['id', 'created_at', 'updated_at','detected_at'];
    public function familie(){
        return $this->belongsTo(Familie::class);
    }

    public function products(){
        return $this->hasMany(Product::class);

    }
    public function blogs(){
        return $this->hasMany(Blog::class);

    }
}
