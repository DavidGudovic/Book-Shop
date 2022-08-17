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
      'image',
    ];
    /*
      Eloquent relationships
    */
    public function books(){
      return $this->hasMany(Book::class);
    }
    /*
     Local scopes

       fiction - isFiction
       nonFiction - !isFiction

    */
    public function scopeFiction($query){
        return $query->where('isFiction',1);
    }

    public function scopeNonFiction($query){
        return $query->where('isFiction',0);
    }
}
