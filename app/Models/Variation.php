<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class variation extends Model
{
    use HasFactory;
    public $timestamps=false;
    // protected $fillable = ['colourID','materialID','sizeID','furnitureID'];
  
    // /**
    //  * Set the categories
    //  *
    //  */
    // public function setColourAttribute($value)
    // {
    //     $this->attributes['colourID'] = json_encode($value);
    // }
  
    // /**
    //  * Get the categories
    //  *
    //  */
    // public function getColourAttribute($value)
    // {
    //     return $this->attributes['colourID'] = json_decode($value);
    // }

    // public function setmaterialAttribute($value)
    // {
    //     $this->attributes['materialID'] = json_encode($value);
    // }
  
    // /**
    //  * Get the categories
    //  *
    //  */
    // public function getmaterialAttribute($value)
    // {
    //     return $this->attributes['materialID'] = json_decode($value);
    // }

    // public function setsizeAttribute($value)
    // {
    //     $this->attributes['sizeID'] = json_encode($value);
    // }
  
    // /**
    //  * Get the categories
    //  *
    //  */
    // public function getsizeAttribute($value)
    // {
    //     return $this->attributes['sizeID'] = json_decode($value);
    // }
    protected $fillable = [
        'image',
        'price',
        'colourID',
        'materialID',
        'size',
        'stock',
       
      ];
    public function products(){
        return $this->belongsTo(Products::class ,'productID','id');
    }

  
    public function colour()
    {
        return $this->belongsTo(Colour::class,'colourID', 'id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class,'materialID', 'id');
    }
    
    public function furniture()
    {
        return $this->belongsTo(Furniture::class,'categoryID', 'id');
    }
}
