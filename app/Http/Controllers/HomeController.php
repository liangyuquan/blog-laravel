<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Http\Requests;
use App\User;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obj_user = new User();
        $obj_comment = new Comment();
        $articles = Article::OrderBy('id','desc')->get();
        if(!empty($articles)){
            foreach ($articles as $v){
                $v['comments_count'] = $obj_comment->getCountByArticleId($v->id);
                $user_data = $obj_user->find($v->user_id);
                $v['user_name'] = $user_data['name'];
            }
        }
        return view('home')->with('articles',$articles);
    }
}
