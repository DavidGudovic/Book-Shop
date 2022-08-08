<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /*
     fields
    */
    protected $fillable = [
      'isbn',
      'name',
      'synopsis',
      'price',
      'category_id',
      'image',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /*
      Eloquent relationships
    */

    public function authors(){
      return $this->belongsToMany(Author::class);
    }

    public function reviews(){
      return $this->hasMany(Review::class);
    }

    public function orders(){
      return $this->belongsToMany(Order::class);
    }

    public function category(){
      return $this->belongsTo(Category::class);
    }

}
