<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function city(){
        $this->hasMany(City::class);
}
}

