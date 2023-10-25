<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
    use HasFactory;
    public $timestamps=false;
    public function variation() {
        return $this->belongsTo(variation::class);
    }
}
