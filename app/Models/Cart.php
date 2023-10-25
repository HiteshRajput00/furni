<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->belongsTo(Products::class,'productID', 'id');
    }

    public function variations()
    {
        return $this->belongsTo(Variation::class,'variationID', 'id');
    }
    protected $fillable = [
        'productID',
        
        'quantity',
       'variationID',
       
      ];
}
