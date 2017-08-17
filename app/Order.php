<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'total', 'delivered'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function orderedProduct() {
        return $this->belongsToMany(Product::class)->withPivot('qty', 'total');
    }
}
