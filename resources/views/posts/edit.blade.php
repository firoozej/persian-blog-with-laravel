@extends('main')

@section('title', '| ویرایش پست')

@section('stylesheets')

{!! Html::style('/css/parsley.css) !!}
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
    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
    <div class="col-md-8">
        <div class="form-group">
            {{ Form::label('title', 'عنوان') }}
            {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}
        </div>
        <div class="form-group">
            {{ Form::label('slug', 'آدرس', ['class' => 'form-spacing-top']) }}
            {{ Form::text('slug', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('category_id', "دسته بندی", ['class' => 'form-spacing-top']) }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('tags', 'تگ ها', ['class' => 'form-spacing-top']) }}
            {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
        </div>
         <div class="form-group">  
            {{ Form::label('featured_img', 'آپلود تصویر شاخص') }}
            {{ Form::file('featured_img') }}
            @if($post->image)
                <img src="{{ url("images/".$post->image) }}" width="100" height="40" style="margin-top:10px" />
            @endif
        </div>
        <div class="form-group">
            {{ Form::label('body', "متن", ['class' => 'form-spacing-top']) }}
            {{ Form::textarea('body', null, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <dt>ثبت شده</dt>
                <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>ویرایش شده</dt>
                <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('posts.show', 'انصراف', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                </div>
                <div class="col-sm-6">
                    {{ Form::submit('ذخبره', ['class' => 'btn btn-success btn-block']) }}
                </div>
            </div>

        </div>
    </div>
    {!! Form::close() !!}
</div>	<!-- end of .row (form) -->

@stop

@section('scripts')

{!! Html::script('/js/select2.min.js') !!} 
{!! Html::script('/js/parsley.min.js') !!}
{!! Html::script('/js/i18n/fa.js') !!}

<script type="text/javascript">
    $('.select2-multi').select2({});
    </script>

@endsection