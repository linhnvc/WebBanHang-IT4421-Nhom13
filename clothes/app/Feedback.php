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

    public static function update_feedback_star($userId, $productId, $star, $time){
        $feedback = DB::table('feedback')->where([['productId', '=', $productId], ['userId', '=', $userId]])->first();
        if(!$feedback)
        {
            $feedback = new Feedback();
            DB::table('feedback')->insert(['productId'=>$productId, 'userId'=>$userId]);
        }
        DB::table('feedback')->where([['productId', '=', $productId], ['userId', '=', $userId]])->update(['star'=>$star, 'date'=>$time]);
    }

    public static function update_feedback_comment($userId, $productId, $comment, $time){
               $feedback = DB::table('feedback')->where([['productId', '=', $productId], ['userId', '=', $userId]])->first();
        if(!$feedback)
        {
            $feedback = new Feedback();
            DB::table('feedback')->insert(['productId'=>$productId, 'userId'=>$userId]);
        }
        DB::table('feedback')->where([['productId', '=', $productId], ['userId', '=', $userId]])->update(['comment'=>$comment, 'date'=>$time]);
        return $feedback->star;
    }
}
