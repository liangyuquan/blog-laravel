<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['nickname', 'email', 'website', 'content', 'article_id'];

    public function getCountByArticleId($article_id){
        return  DB::table($this->table)
            ->where('article_id',$article_id)
            ->count();
    }
}
