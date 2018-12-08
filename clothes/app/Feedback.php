<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class Feedback extends Model
{
    public $timestamps = false;
    protected $table = "feedback";
    
   	public static function getCommentAndStarOfUsers($id_user, $id_product){
        $comment_star = DB::table('feedback')->join('user', 'feedback.userId', '=', 'user.userId')->where('productId', '=', $id_product)->select(
            'user.userId',
            'user.userName',
            'feedback.comment',
            'feedback.date',
            'feedback.star'
        )
        ->get();
        return $comment_star;
    }

    public static function getFeedbacks(){
        $comment_star = DB::table('feedback')->join('user', 'feedback.userId', '=', 'user.userId')->join('product', 'product.productId', '=', 'feedback.productId')->select(
            'user.userId',
            'user.userName',
            'product.name',
            'feedback.comment',
            'feedback.date',
            'feedback.star'
        )
        ->get();
        return $comment_star;
    }
}
