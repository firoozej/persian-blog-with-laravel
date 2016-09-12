@extends('main')

@section('title', "| ویرایش تگ")

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        {{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => "PUT"]) }}
        <h2>ویرایش تگ</h2>
        <div class="form-group">
            {{ Form::label('name', "عنوان") }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div> 
        <div class="form-group">      
            {{ Form::submit('ذخیره', ['class' => 'btn btn-success', 'style' => 'margin-top:20px;']) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection