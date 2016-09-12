@extends('main')

@section('title', '| تماس با من')

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
        <h1>تماس با من</h1>
        <hr>
        <form action="{{ url('contact') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label name="email">ایمیل:</label>
                <input id="email" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label name="subject">موضوع:</label>
                <input id="subject" name="subject" class="form-control">
            </div>

            <div class="form-group">
                <label name="message">پیام:</label>
                <textarea id="message" name="message" class="form-control"></textarea>
            </div>

            <input type="submit" value="فرستادن پیام" class="btn btn-success">
        </form>
    </div>
        </div>
@endsection