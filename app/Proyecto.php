<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    //
    public function PO(){
        return $this->belongsTo('App\User','product_owner');
    }

    public function SM(){
        return $this->belongsTo('App\User','scrum_master');
    }
}
