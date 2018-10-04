<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //

    public function advertisement(){
        return $this->belongsTo(Advertisement::class);
    }
}
