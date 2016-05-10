@extends('app')
@section('content')

        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit Post
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
	 <div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Внимание!</strong> в введенных вами данных есть ошибка.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<div class="panel-heading">Posts</div>
				<div class="panel-body">
					<div>
						
						{!! link_to_route('admin.posts.index','all') !!} &nbsp;&nbsp;	
						{!! link_to_route('admin.posts.create','create') !!}&nbsp;&nbsp;
						
					</div>
					
					@foreach($post as $val)
						@include('layout.form_up')
					@endforeach
				</div>
			</div>
		</div>
	 </div>
	</div>
</section>

@stop

























