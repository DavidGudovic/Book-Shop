<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;
    /*
     Flags
    */
    public const STATUS_PENDING = 1;
    public const STATUS_REFUNDED= 2;
    public const STATUS_DENIED = 3;
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
