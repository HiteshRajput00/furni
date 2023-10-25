<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class furniture extends Model
{
    use HasFactory;
    public $timestamps=false;
    public function product() {
        return $this->hasMany(products::class);
    }
}
