<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerEmail extends Model
{
    protected $fillable = ['customer_id', 'email', 'tipo'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
