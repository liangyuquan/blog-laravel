<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        $field = [
            'comments.*',
            'articles.title',
        ];
        $comments = DB::table('comments')
            ->leftJoin('articles', 'comments.article_id', '=', 'articles.id')
            ->select($field)
            ->get();
        //$comments = Comment::orderBy('id','desc')->get();
        return view('admin/comment/index')->withComments($comments);
    }

    //update view
    public function edit($id) {
        $comment = Comment::find($id);
        return view('admin/comment/edit')->with('comment', $comment);
    }

    //更新
    public function update($id, Request $request)
    {
        $this->validate($request, [ // 排除掉当前编辑的数据
            'nickname' => 'required|max:64',
            'content' => 'required',
            'email' => 'required',
        ]);
        $comment          = Comment::findOrFail($id);
        $comment->nickname= $request->get('nickname');
        $comment->content = $request->get('content');
        $comment->email = $request->get('email');
        $comment->updated_at = getNow();

        if ($comment->save()) {
            return redirect('admin/comment');
        } else {
            return redirect()->back()->withInput()->withErrors('保存信息失败！');
        }
    }
    //删除
    public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}
