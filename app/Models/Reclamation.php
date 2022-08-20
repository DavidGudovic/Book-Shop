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
    /*
      Eloquent relationships
    */
    public function user(){
      return $this->belongsTo(User::class);
    }

    public function order(){
      return $this->belongsTo(Order::class);
    }

    /*
    Eloquent scopes
    */
    public function scopeStatus($query, int $status)
    {
      return $query->where('status', $status);
    }

    public function scopeSearch($query, $query_string)
    {
      return  $query->where('id', $query_string)
                    ->orWhere('user_id', $query_string)
                    ->orWhere('order_id', $query_string);
    }

}
