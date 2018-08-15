<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model {

    protected $fillable = [
        'title', 'description', 'product_id', 'user_id', 'attachment'
    ];

    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

}
