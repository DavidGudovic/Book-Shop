<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;
  /*
  fields
  */
  protected $fillable = [
    'name',
    'email',
    'password',
    'username',
    'role',
  ];

  protected $hidden = [
    'password',
    'remember_token',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  /*
  Eloquent relationships
  */

  public function orders(){
    return $this->hasMany(Order::class);
  }

  public function reviews(){
    return $this->hasMany(Review::class);
  }

  public function reclamations(){
    return $this->hasMany(Reclamation::class);
  }


  /*
  Eloquent scopes
  */

  public function scopeRole($query, $role){
    return $query->where('role', $role);
  }

  /*
  Not sure if implementing this as a scope is the right way to go about it,
  For books it's a Service method
  */
  public function scopeSearch($query, $query_string){

    $query_string = join("%", explode(" ", $query_string));

    return  $query->where('name','LIKE','%'.$query_string.'%')
                  ->orWhere('username','LIKE','%'.$query_string.'%')
                  ->orWhere('email','LIKE','%'.$query_string.'%');
  }

}
