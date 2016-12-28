<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
        'item_id', 'seller_id','buyer_id', 'completed'
    ];

    public function seller(){
        return $this->belongsTo('\App\User','seller_id');
    }

    public function buyer(){
        return $this->belongsTo('\App\User','buyer_id');
    }

    public function item(){
        return $this->hasOne('\App\User','item_id');
    }

}
