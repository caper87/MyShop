@extends('app')
@section('content')

        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Add Post
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
				<div class="panel-heading">Добавить категорию</div>
				@include('layout.admin_menu')
				<div class="panel-body admin_content col-md-9">
										
					{!! Form::open(['route' => 'admin.cat.store']) !!} 

					<div class="form-group">
					{!! Form::label('Название Категории') !!}
					{!! Form::text('cat_name',null,['class' => 'form-control']) !!}
					</div>
					
					<div class="form-group">
						{!! Form::label('Описание категории') !!}
						{!! Form::textarea('cat_descr',null,['class' => 'form-control']) !!}
					</div>
					
					<div class="form-group">
						
						{!! Form::submit('Добавить', ['class' => 'form-submit']) !!}
					</div>
					{!! Form::close() !!}

					
				</div>
				<div  class="cl" ></div>
			</div>
		</div>
	 </div>
	</div>
</section>

@stop
























