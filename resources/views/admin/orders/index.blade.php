@extends('app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<p>Рецепты Украинской кухни</p>
					@include('flash::message')
				</div>
				@include('layout.admin_menu')
				
				<div class="panel-body admin_content col-md-9">
					<div class="panel-body filter_panel">
						<p>{!! link_to_route('admin.posts.published','Опубликованные') !!} </p>
						<p>{!! link_to_route('admin.posts.unpublished','Не опубликованные') !!} </p>
						{!! Form::open(array('url' => '')) !!}
						
						{!! Form::close() !!}
					</div>
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					
					<div>
					
						
						
					</div>
					@foreach ($posts as $post)
						<article>
							<h2>{{ $post->title }}</h2>
							<b>{{ $post->intro }}</b>
							<p>{{ $post->created_at }}</p>
							
							 {!! Form::open(array('url' => 'admin/posts/' . $post->id,'onsubmit' => 'return ConfirmDelete()')) !!}
							 <a class="btn  btn-info" href="/admin/posts/{{ $post->id }}/edit">Редактировать</a>&nbsp;&nbsp;
			                    {!! Form::hidden('_method', 'DELETE') !!}
			                    {!! Form::submit('Удалить', array('class' => 'btn btn-warning')) !!}
			                {!! Form::close() !!}
						</article>
					@endforeach
				</div>
				<div  class="cl" ></div>
			</div>
		</div>
	</div>
</div>


@endsection
