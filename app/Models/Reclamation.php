<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;
    /*
     fields
    */
    protected $fillable = [
      'text',
      'status',
      'user_id',
      'order_id',
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
    
    public function order(){
      return $this->belongsTo(Order::class);
    }
}
