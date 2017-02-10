@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">评论管理</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Article_Id</th>
                                <th>Content</th>
                                <th>Nickname</th>
                                <th>Time</th>
                                <th>operate</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($comments as $v)
                                <tr>
                                    <td>{{ $v->article_id }}</td>
                                    <td>{{ $v->content }}</td>
                                    <td>{{ $v->nickname }}</td>
                                    <td>{{ $v->created_at }}</td>
                                    <td>
                                        <a href="{{ url('admin/comment/'.$v->id.'/edit') }}" class="btn btn-success">编辑</a>
                                        <form action="{{ url('admin/comment/'.$v->id) }}" method="POST" style="display: inline;">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">删除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection