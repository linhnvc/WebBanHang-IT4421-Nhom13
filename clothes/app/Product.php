<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table= 'product';
    public $timestamps = false;
    public function category()
    {
        return $this->belongsTo('App\Category', 'categoryId','categoryId');
    }
    public function firm()
    {
        return $this->belongsTo('App\Firm', 'FirmId','firmId');
    }
    public function image()
    {
        return $this->hasMany('App\Image','productId','productId');
    }

}
