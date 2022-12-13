<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    public function creator()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
