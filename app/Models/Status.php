<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $guarded = ['id', 'created_at', 'updated_at','detected_at'];
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
