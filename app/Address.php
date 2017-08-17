<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id', 'name', 'address1', 'address2', 
        'country', 'city', 'state', 'zip', 'phone'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
