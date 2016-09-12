@extends('main')

@section('title', '| همه تگ ها')

@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="well">
            {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
            <h2>تگ جدید</h2>
            <div class="form-group">
                {{ Form::label('name', 'نام') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div> 
            <div class="form-group"> 
                {{ Form::submit('ایجاد تگ جدید', ['class' => 'btn btn-primary btn-block']) }}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-8">
        <h1>تگ ها</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>نام</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <th>{{ $tag->id }}</th>
                    <td>{{ $tag->name }}</td>
                    <td><a href="{{ route('tags.show', $tag->id) }}" class="btn btn-default btn-sm">مشاهده</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- end of .col-md-8 -->


	</div>

@endsection