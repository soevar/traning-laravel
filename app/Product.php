<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $table = 'product';
    protected $fillable = [
        'code', 'name', 'description'
    ];

    public function problems() {
        return $this->hasMany('App\Problem');
    }

}
