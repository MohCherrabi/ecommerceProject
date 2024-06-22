<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $guarded = ['id', 'created_at', 'updated_at','detected_at'];
    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function payment_mode(){
        return $this->belongsTo(PaymentMode::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function orders_details(){
        return $this->hasMany(OrderDetail::class);
    }
}
