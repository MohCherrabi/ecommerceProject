<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipping extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'shipping_address',
        'city',
        'state',
        'zip_code',
        'country',
        'shipping_method',
        'tracking_number',
        'shipping_date',
        'estimated_delivery_date',
        'delivery_status',
        'shipping_cost',
    ];

    /**
     * Get the order that owns the shipping information.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the user that owns the shipping information.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
