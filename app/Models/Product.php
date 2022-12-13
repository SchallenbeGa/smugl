<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function creator()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
