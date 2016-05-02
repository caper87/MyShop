@extends('app')
@section('content')

        <!-- Content Header (Page header) -->

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
				<div class="panel-heading">Posts
				@include('flash::message')</div>
				@include('layout.admin_menu')
				<div class="panel-body admin_content col-md-9">
					
					{!! Form::open(['route' => 'admin.items.store','files' => true,'method' => 'POST',]) !!} 

					<div class="form-group">
						{!! Form::label('Заголовок') !!}
						{!! Form::text('title',null,['class' => 'form-control']) !!}
					</div>
					
					<div class="form-group">
						{!! Form::label('Псевдоним для URL') !!}
						{!! Form::text('slug',null,['class' => 'form-control']) !!}
					</div>
					
					<div class="form-group">
						{!! Form::label('Цена') !!}
						{!! Form::text('price', null,['class' => 'form-control']) !!}
					</div>
					
					<div class="form-group">
						{!! Form::label('Описание товара') !!}
						{!! Form::textarea('description', null,['class' => 'form-control']) !!}
					</div>
					
					<div class="form-group">
						{!! Form::label('Характеристики') !!}
						{!! Form::textarea('features', null,['class' => 'form-control','id'=>'editor']) !!}
					</div>
					<!--CKEDITOR-->
					<script type="text/javascript">
						var ckeditor1 = CKEDITOR.replace( 'editor' );
						AjexFileManager.init({
							returnTo: 'ckeditor',
							editor: ckeditor1
						});
					</script>
					<!--<div class="form-group">
						{!! Form::label('Фото') !!}
						{!! Form::file('img',null,['class' => 'form-control']) !!}
					</div>-->
					<div class="form-group">
						{!! Form::label('Категория') !!}<br/>
						{!! Form::select('cat_id',$cats,[ 0 =>'Выберите категорию'],['class' => 'form-control', 'onchange' =>'loadSubCat(this)']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('Подкатегория') !!}<br/>
						{!! Form::select('subcat_id',['0' => 'Выберите подкатегорию'],null,['class' => 'form-control']) !!}
					</div>
					<!--<div class="form-group">
						{!! Form::label('meta title') !!}
						{!! Form::text('meta_title',null,['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('meta descr') !!}
						{!! Form::text('meta_descr',null,['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('meta keyw') !!}
						{!! Form::text('meta_keyw',null,['class' => 'form-control']) !!}
					</div>-->

					<div class="form-group">
						{!! Form::label('Публиковать') !!}<br/>
						<span>Да</span>
						{!! Form::radio('published',1) !!}
						<span>Нет</span>
						{!! Form::radio('published',0) !!}
					</div>
						
					<div class="form-group">
						
						{!! Form::submit('Cохранить', ['class' => 'form-submit']) !!}
					</div>
					{!! Form::close() !!}

					
				</div>
				<div  class="cl" ></div>
			</div>
		</div>
	 </div>
	</div>
</section>
<!--CKEDITOR-->
<script type="text/javascript">
	var ckeditor1 = CKEDITOR.replace( 'editor' );
	AjexFileManager.init({
		returnTo: 'ckeditor',
		editor: ckeditor1
	});
</script>
<!--Аякс подгрузка подкатегорий-->
<script>
	function loadSubCat(select){
		var carSelect = $('select[name="subcat_id"]');
		$.getJSON('/admin/subcat', { 
		    action:'getSubCat',
		    cat:select.value
		}, function(seriesList){
		    carSelect.html('');
		    $.each(seriesList, function(i){
		        carSelect.append('<option value="' + i + '">' + this + '</option>');
		    });
		});
	}
	
</script>
@stop
























