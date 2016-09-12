@extends('main')

@section('title', '| ویرایش دسته بندی')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>ویرایش دسته بندی</h1>
                 {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}       
                    <div class="form-group">
                        {{ Form::label('name', 'نام') }}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                    {{ Form::submit('ذخیره', ['class' => 'btn btn-primary']) }}
                    </div>
                
                {!! Form::close() !!}
        </div> <!-- end of .col-md-8 -->
    </div>

@endsection