<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubProduct extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $guarded = ['id', 'created_at', 'updated_at', 'detected_at'];
    public function status()
    {
        $this->belongsTo(Status::class);
    }

    public function sub_familie()
    {
        return $this->belongsTo(SubFamilie::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function orders_details()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function priceTTC()
    {
        if (!empty($this->price_ht)) {
                return round($this->price_ht + ($this->price_ht * ($this->VAT / 100)), 2);

            }else{
            return "Free";
        }
    }
    public function priceTTC2()
    {
        if (!empty($this->new_price_ht)) {
            return round($this->new_price_ht + ($this->new_price_ht * ($this->VAT / 100)), 2);
        }
    }
}
