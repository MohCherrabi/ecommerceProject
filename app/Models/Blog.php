<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $guarded = ['id', 'created_at', 'updated_at','detected_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sub_familie()
    {
        return $this->belongsTo(SubFamilie::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
