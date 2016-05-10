@extends('app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Posts</div>
				<div class="panel-body">
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
					
						{!! link_to_route('admin.posts.index','all') !!} &nbsp;&nbsp;	
						{!! link_to_route('admin.posts.create','create') !!}&nbsp;&nbsp;
						{!! link_to_route('admin.posts.published','published') !!} &nbsp;&nbsp;
						{!! link_to_route('admin.posts.unpublished','unpublished') !!} &nbsp;&nbsp;
						
					</div>
					@foreach ($posts as $post)
						<article>
							<h2>{{ $post->title }}</h2>
							<b>{{ $post->intro }}</b>
							<p>{{ $post->created_at }}</p>
							
							 {!! Form::open(array('url' => 'admin/posts/' . $post->id)) !!}
							 <a class="btn  btn-info" href="{{ $post->id }}/edit">edit</a>&nbsp;&nbsp;
			                    {!! Form::hidden('_method', 'DELETE') !!}
			                    {!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
			                {!! Form::close() !!}
						</article>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
