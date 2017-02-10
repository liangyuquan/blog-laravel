@extends('header')

<div id="title" style="text-align: center;">
    <h1>GreenForest</h1>
    <div style="padding: 5px; font-size: 16px;">GreenForest</div>
</div>
<hr>
<div id="content">
    <ul>
        @foreach ($articles as $article)
            <li class="col-md-8">
                <div class="title">
                    <a href="{{ url('article/'.$article->id) }}">
                        <h4>{{ $article->title }}</h4>
                    </a>
                </div>
                <div class="body">
                    <p>{{ $article->body }}</p>
                </div>
                <p>
                    Author:{{ $article->user_name }}
                    Time:{{ $article->created_at }}
                    Read:{{ $article->is_read }}
                    Comments:{{ $article->comments_count }}
                    Recommend:{{ $article->recommend }}
                </p>
            </li>
        @endforeach
    </ul>
</div>

@extends('footer')