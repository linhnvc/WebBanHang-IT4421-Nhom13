<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\User;

class BillDetail extends Model
{
    public $timestamps = false;
    protected $table = "billdetail";

    public function bill(){
    	return $this->beLongsto("App\Bill", "billId", "billId");
    }
}
