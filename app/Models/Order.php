<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
  use HasFactory;

  /*
  Flags
  */
  public const STATUS_PENDING = 1;
  public const STATUS_SUCCESSFULL = 2;
  public const STATUS_CANCELLED = 3;
  public const STATUS_REFUNDED = 4;
  /*
  fields
  */
  protected $fillable = [
    'status',
    'total_price',
    'user_id',
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
    return $this->belongsToMany(Book::class)->withPivot('quantity');
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
                  ->orWhere('user_id', $query_string);
  }

  public function scopeUser($query, $userId)
  {
    return $query->where('user_id', $userId);
  }

}
