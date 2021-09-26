<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $with = ['customer'];


    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
