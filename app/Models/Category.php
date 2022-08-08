<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    /*
     fields
    */
    protected $fillable = [
      'name',
      'isFiction',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /*
      Eloquent relationships
    */
    public function books(){
      return $this->hasMany(Book::class);
    }
}
