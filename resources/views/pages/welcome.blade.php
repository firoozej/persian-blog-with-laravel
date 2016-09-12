@extends('main')

@section('title', '| صفحه اصلی')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h1>خوش آمدید</h1>
            <p class="lead">از یک سیستم بلاگینگ پایه استفاده کنید و آن را توسعه بدهید</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">وبلاگ</a></p>
        </div>
    </div>
</div> <!-- end of header .row -->

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

        @foreach($posts as $post)

        <div class="post">
            <h3>{{ $post->title }}</h3>
            <p>{{ mb_substr(strip_tags($post->body), 0, 300) }}{{ mb_strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
            <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">بیشتر بخوانید</a>
        </div>

        <hr>

        @endforeach

    </div>


        </div>
@stop