<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    protected $table= 'firm';
    public $timestamps = false;
    public function product()
    {
        return $this->hasMany('App\Product', 'FirmId','firmId');
    }
}
