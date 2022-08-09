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
      'isRecommended',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /*
      Eloquent relationships
    */

    public function authors(){
      return $this->belongsToMany(Author::class)->as('authors');
    }

    public function reviews(){
      return $this->hasMany(Review::class);
    }

    public function orders(){
      return $this->belongsToMany(Order::class)->withPivot('quantity')->as('orders');
    }

    public function category(){
      return $this->belongsTo(Category::class);
    }

    /*
     Local scopes
       recommended - isRecommended = 1
       fiction - isFiction
       nonFiction - !isFiction
       category($categoryId) - category_id = $categoryId
    */
    public function scopeRecommended($query)
    {
        return $query->where('isRecommended',1);
    }

    public function scopeFiction($query)
    {
        return $query->whereHas('Category', function($q){$q->where('isFiction', 1);});
    }

    public function scopeNonFiction($query)
    {
        return $query->whereHas('Category', function($q){$q->where('isFiction', 0);});
    }

    public function scopeCategory($query, $categoryId){
      return $query->where('category_id', $categoryId);
    }

}
