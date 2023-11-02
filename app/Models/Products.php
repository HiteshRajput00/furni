<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Variation;

class products extends Model
{

    use HasFactory;
    public $timestamps = false;
    // public function colour()
    // {
    //     return $this->belongsTo(Colour::class,'colourID', 'id');
    // }

    // public function material()
    // {
    //     return $this->belongsTo(material::class,'materialID', 'id');
    // }
    // public function size()
    // {
    //     return $this->belongsTo(size::class,'sizeID', 'id');
    // }
    public function furniture()
    {
        return $this->belongsTo(Furniture::class,'categoryID','id');
    }
    // public function type()
    // {
    //     return $this->belongsTo(type::class,'typeID', 'id');
    // }
    protected $fillable = [
        'product',
        
        
       'typeID',
       'categoryID',
      ];
      public function variation()
     {
         return $this->hasMany(Variation::class,'productID','id');
     }

}
