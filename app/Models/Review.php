<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    /*
     fields
    */
    protected $fillable = [
      'user_id',
      'book_id',
      'text',
      'score',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /*
      Eloquent relationships
    */
    public function user(){
      return $this->belongsTo(User::class);
    }

    public function book(){
      return $this->belongsTo(Book::class);
    }
}
