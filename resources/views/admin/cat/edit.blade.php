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
				<div class="panel-heading">Posts</div>
				@include('layout.admin_menu')
				<div class="panel-body admin_content col-md-9">
										
					@foreach($cat as $val)
						{!! Form::open(['route' => ['admin.cat.update',$val->cat_id]]) !!} 
						{!! Form::input('hidden', '_method','PUT' ) !!}
					<div class="form-group">
						{!! Form::label('Название категории') !!}
						{!! Form::text('cat_name', $val->cat_name,['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('Описание категории') !!}
						{!! Form::textarea('cat_descr',$val->cat_descr,['class' => 'form-control']) !!}
					</div>
					
					<div class="form-group">
						
					</div>

					<div class="form-group">
						{!! Form::submit('Cохранить', ['class' => 'form-submit']) !!}
					</div>
						{!! Form::close() !!}
					
					
					<div class="form-group">
						{!! Form::label('Название Подкатегории') !!}
						{!! Form::hidden('cat_id', $val->cat_id) !!}
						{!! Form::text('subcat_name',null,['class' => 'form-control','id'=>'subcat_name']) !!}
					</div>
						
					<div class="form-group">
						{!! Form::button('Добавить', ['class' => 'form-submit','id'=>'subcatAdd']) !!}
					</div>
						<table class="subcat_admin_item" width=100%>
							@foreach($subcat as $val)
								<tr id="row_{{$val->subcat_id}}">
									<td>{{ $val->subcat_name }}</td>
									<td>
						                {!! Form::open(['onclick' => 'return ConfirmDelete()']) !!}
						                	{!! Form::hidden('_method', 'DELETE') !!}
						                    {!! Form::button('Удалить', array(
						                    	'class' => 'btn btn-warning del_button',
						                    	'id'=>$val->subcat_id,
						                    )) !!}
						                   
						                {!! Form::close() !!}
						             </td>
					             </tr>   
							@endforeach
						</table>
					@endforeach
				</div>
				<div  class="cl" ></div>
			</div>
		</div>
	 </div>
	</div>
</section>



@stop

























