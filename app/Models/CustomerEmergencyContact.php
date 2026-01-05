<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerEmergencyContact extends Model
{
    protected $fillable = ['customer_id', 'nome', 'telefone', 'parentesco'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
