@extends('main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('content')

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">منوی اصلی</div>
            <ul class="list-group">
                <li class="list-group-item"><a href="/">صفحه اصلی</a></li>
                <li class="list-group-item"><a href="/blog">وبلاگ</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-9">
        <img src="{{asset('/images/' . $post->image)}}" width="800" height="400" />
        <h1>{{ $post->title }}</h1>
        <p>{!! $post->body !!}</p>
        <hr>
        <p>دسته بندی :‌ {{ $post->category->name }}</p>
    </div>
</div>

<div class="row">

    <div class="col-md-9 col-md-offset-3">
        <h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span> پیام  {{ $post->comments()->count() }}</h3>
        @foreach($post->comments as $comment)
        <div class="comment">
            <div class="author-info">

                <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" class="author-image">
                <div class="author-name">
                    <h4>{{ $comment->name }}</h4>
                    <p class="author-time">{{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
                </div>

            </div>

            <div class="comment-content">
                {{ $comment->comment }}
            </div>

        </div>
        @endforeach
    </div>
</div>

<div class="row">
    <div id="comment-form" class="col-md-9 col-md-offset-3" style="margin-top: 50px;">
        {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('name', "نام") }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div> 
            </div>

            <div class="col-md-6">
                <div class="form-group">    
                    {{ Form::label('email', 'ایمیل') }}
                    {{ Form::text('email', null, ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">    
                    {{ Form::label('comment', "پیام") }}
                    {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
                </div>
                <div class="form-group">    
                    {{ Form::submit('فرستادن پیام', ['class' => 'btn btn-success', 'style' => 'margin-top:15px;']) }}
                </div>
            </div>
        </div>

        {{ Form::close() }}
    </div>
	</div>

@endsection
