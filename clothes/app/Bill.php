<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\User;

class Bill extends Model
{
    public $timestamps = false;
    protected $table = "bill";
    protected $primaryKey = "billId";

    public static function getBills(){
        $bill_list = Bill::all();
    	return $bill_list;
    }

    public static function getBillsOfUser($id_user){
        $bills = DB::table('bill')->join('user', 'bill.userId', '=', 'user.userId')->select(
            'bill.billId',
            'bill.date',
            'bill.total',
            'bill.checked'
        )
        ->get();
        return $bills;
    }

    public static function getBillById($id){
        $bill_info = DB::table('bill')->join('billdetail', 'bill.billId', '=', 'billdetail.billId')
        ->select(
            'bill.billId',
            'bill.date',
            'bill.userId',
            'billdetail.productId',
            'billdetail.quantity'
        )
        ->get();
 		$bill_infos = '';
        $num = 0;
        foreach ($bill_info as $bill) {
        	$user_info =  DB::table('user')->select('userName', 'email')->where('userId', '=', $bill->userId)->first();
        	$product_info = DB::table('product')->select('name')->where('productId', '=', $bill->productId)->first();
            $billId = $bill->billId;
            $date = $bill->date;
            $userId = $bill->userId;
        	$quantity = $bill->quantity;
        	$user_name = $user_info->userName;
            $email = $user_info->email;
        	$bill_infos .= $product_info->name. ';' .$quantity. ';' ;
            $num = $num + 1;
        }
        $bill_infos .= $user_name.';'.$userId.';'.$billId.';'.$date.';'.$email.';'.$num.';';
        return $bill_infos;

    }
}
