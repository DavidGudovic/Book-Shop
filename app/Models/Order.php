<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    /*
     fields
    */
    protected $fillable = [
      'status',
      'total_price',
      'user_id',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /*
      Eloquent relationships
    */
    public function reclamation(){
      return $this->hasOne(Reclamation::class);
    }

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function books(){
      return $this->belongsToMany(Book::class);
    }
}
