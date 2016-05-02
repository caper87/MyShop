@extends('app')
@section('content')

        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
         Post
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
				<div class="panel-heading">Posts</div>
				@include('layout.admin_menu')
				<div class="panel-body col-md-9">
					
					@foreach($post as $post)
						<article>
							<h2>{{ $post->title }}</h2>
							<p>{{ $post->created_at }}</p>
							<b>{{ $post->content }}</b>
						</article>
				@endforeach
				</div>
				<div  class="cl" ></div>
			</div>
		</div>
	 </div>
	</div>
</section>

@stop

























