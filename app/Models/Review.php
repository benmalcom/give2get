<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = [
        'body', 'item_id','user_id'
    ];

    public function poster(){
        return $this->belongsTo('\App\User','user_id');
    }
}
