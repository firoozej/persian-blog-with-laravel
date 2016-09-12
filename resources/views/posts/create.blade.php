@extends('main')

@section('title', '| ایجاد پست جدید')

@section('stylesheets')

{!! Html::style('/css/parsley.css') !!}
{!! Html::style('/css/select2.min.css') !!}
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'link code',
        menubar: "tools",
        directionality: 'rtl'
    });
</script>

@endsection

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>ایجاد پست جدید</h1>
        <hr>
        {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true)) !!}
        <div class="form-group">
            {{ Form::label('title', 'عنوان') }}
            {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
        </div>
        <div class="form-group">  
            {{ Form::label('slug', 'آدرس') }}
            {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255') ) }}
        </div>
        <div class="form-group">  
            {{ Form::label('category_id', 'دسته بندی') }}
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                <option value='{{ $category->id }}'>{{ $category->name }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">  
            {{ Form::label('tags', 'تگ ها') }}
            <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">  
            {{ Form::label('featured_img', 'آپلود تصویر شاخص') }}
            {{ Form::file('featured_img') }}
        </div>
        <div class="form-group">  
            {{ Form::label('body', "متن") }}
            {{ Form::textarea('body', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">  
            {{ Form::submit('ذخیره', array('class' => 'btn btn-success btn-lg', 'style' => 'margin-top: 20px;')) }}
        </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection


@section('scripts')

{!! Html::script('/js/select2.min.js') !!} 
{!! Html::script('/js/parsley.min.js') !!}
{!! Html::script('/js/i18n/fa.js') !!}

<script type="text/javascript">
    $('.select2-multi').select2({});
	</script>

@endsection
