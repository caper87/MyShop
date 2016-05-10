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
										
					@foreach($post as $val)
						{!! Form::open(['route' => ['admin.posts.update',$val->id],'files' => true,'method' => 'POST']) !!} 
						{!! Form::input('hidden', '_method','PUT' ) !!}
						{!! Form::hidden('post_id', $val->id) !!}
					<div class="form-group">
						{!! Form::label('Заголовок') !!}
						{!! Form::text('title', $val->title,['class' => 'form-control']) !!}
					</div>
					
					
					<div class="form-group">
						{!! Form::label('Теги') !!}
						
						{!! Form::text('tag_name',null,['class' => 'form-control','id'=>'tag_name']) !!}
					</div>
						
					<div class="form-group">
						{!! Form::button('Добавить', ['class' => 'form-submit','id'=>'tagAdd']) !!}
					</div>
					
					<div class="tag_list">
					@foreach($tags as $val2)
						<span id="row_{{$val2->tag_id}}" class="tag_row">
							<span >{{ $val2->tag_name }}</span>

			                    {!! Form::button('x', array(
			                    	'class' => 'btn btn-warning del_tag_button',
			                    	'onclick' => 'return ConfirmDelete()',
			                    	'id'=>$val2->tag_id,
			                    )) !!}
			             </span>   
					@endforeach
					</div>
					
					<div class="form-group">
						{!! Form::label('Аннотация') !!}
						{!! Form::textarea('intro', $val->intro,['class' => 'form-control']) !!}
					</div>
					
					<div class="form-group">
						{!! Form::label('Содержимое') !!}
						{!! Form::textarea('content', $val->content,['class' => 'form-control','id'=>'editor']) !!}
					</div>
					
					<div class="form-group">
						{!! Form::label('Фото') !!}<br/>
						<img width=120 src="/{{ $val->img }}" alt="" />
						<p></p>
						{!! Form::file('img', ['class' => 'form-control','value'=>$val->img]) !!}
					</div>
					<div class="form-group">
						{!! Form::label('Категория') !!}
						{!! Form::select('cat_id',$cats, $val->cat_id,['class' => 'form-control','onchange' =>'loadSubCat(this)']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('Подкатегория') !!}
						{!! Form::select('sub_cat_id',$subcat, $val->sub_cat_id,['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('meta title') !!}
						{!! Form::text('meta_title', $val->meta_title,['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('meta descr') !!}
						{!! Form::text('meta_descr', $val->meta_descr,['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('meta keyw') !!}
						{!! Form::text('meta_keyw', $val->meta_keyw,['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('Публиковать') !!}<br/>
						<span>Да</span>
						{!! Form::radio('published',1, $val->published?['checked' => 'checked']:false) !!}
						<span>Нет</span>
						{!! Form::radio('published',0, $val->published?false:['checked' => 'checked']) !!}
					</div>

					<div class="form-group">
						
						{!! Form::submit('Cохранить',null, ['class' => 'form-submit']) !!}
					</div>
					{!! Form::close() !!}

					@endforeach
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
		var carSelect = $('select[name="sub_cat_id"]');
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

























