<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    public function city(){
        return $this->belongsTo(City::class);
//        why without city_id it is working??
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
//             why without user_id it is working??
    }

    public function image(){
        return $this->hasmany(Image::class);
    }
}
