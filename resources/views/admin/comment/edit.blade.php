@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">保存评论</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>保存失败</strong> 输入不符合要求<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form action="{{ url('admin/comment/'.$comment->id) }}" method="POST">
                            {{ method_field('PUT') }}
                            {!! csrf_field() !!}
                            <input type="text" name="nickname" class="form-control" required="required" placeholder="请输入用户名称" value="{{$comment->nickname}}">
                            <br>
                            <input type="text" name="email" class="form-control" required="required" placeholder="请输入用户邮箱" value="{{$comment->email}}">
                            <br>
                            <textarea name="content" rows="10" class="form-control" required="required" placeholder="请输入内容">{{$comment->content}}</textarea>
                            <br>
                            <button class="btn btn-lg btn-info">保存评论</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection