<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Comment;
use App\Http\Traits\FilterFieldTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Propaganistas\LaravelFakeId\RoutesWithFakeIds;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable,FilterFieldTrait,RoutesWithFakeIds;

    protected $withCount = ['orders'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   public function comment()
   {
       return $this->hasMany(Comment::class);
   }
   public function orders()
   {
       return $this->hasMany(Order::class);
   }
}
