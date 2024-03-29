<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function store_config(){
        $this->belongsToMany('App\Store_Configuration');
    }
}
