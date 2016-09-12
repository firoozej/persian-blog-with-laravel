@extends('main')

@section('title', '| همه دسته بندی ها')

@section('content')

	<div class="row">
		<div class="col-md-4">
            <div class="well">
                {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                    <h2>دسته بندی جدید</h2>
                    <div class="form-group">
                        {{ Form::label('name', 'نام') }}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                    {{ Form::submit('ذخیره', ['class' => 'btn btn-primary']) }}
                    </div>
                
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-8">
			<h1>همه دسته بندی ها</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>نام</th>
                        <th></th> 
                        
					</tr>
				</thead>

				<tbody>
					@foreach ($categories as $category)
					<tr>
						<th>{{ $category->id }}</th>
						<td>{{ $category->name }}</td>
                        <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-default btn-sm">ویرایش</a> 
                        <form id="form-list" method="DELETE" action="{{ route('categories.destroy', $category->id) }}"><a onclick="$('#form-list').submit()" class="btn btn-default btn-sm">حذف</a></form></td> 
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of .col-md-8 -->
	</div>

@endsection