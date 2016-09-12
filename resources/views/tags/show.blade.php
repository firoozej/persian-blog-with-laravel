@extends('main')

@section('title', "| $tag->name Tag")

@section('content')
<div class="row"> 
    <div class="col-md-4">
        <div class="well">
         <h2>ویرایش تگ</h2>   
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary pull-right btn-block" style="margin-top:20px;">ویرایش</a>
                </div>
                <div class="col-md-6">
                    {{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}
                    {{ Form::submit('حذف', ['class' => 'btn btn-danger btn-block', 'style' => 'margin-top:20px;']) }}
                    {{ Form::close() }}
                </div>
                <div class="col-md-12">
                    {{ Html::linkRoute('tags.index', '<< مشاهده همه', array(), ['class' => 'btn btn-default btn-block btn-spacing']) }}
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-8">
        <h1>تگ {{ $tag->name }}<small> {{ $tag->posts()->count() }} پست</small></h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>عنوان</th>
                    <th>تگ ها</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($tag->posts as $post)
                <tr>
                    <th>{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>@foreach ($post->tags as $tag)
                        <span class="label label-default">{{ $tag->name }}</span>
                        @endforeach
                    </td>
                    <td><a href="{{ route('posts.show', $post->id ) }}" class="btn btn-default btn-xs">مشاهده</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
	</div>

@endsection