<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingDetails extends Model
{
    use HasFactory;
    public function Orders()
    {
        return $this->belongsTo(Order::class,'billing_detailsID','id');
    }
}
