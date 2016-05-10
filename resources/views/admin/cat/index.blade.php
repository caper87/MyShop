@extends('app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Tags</div>
				@include('layout.admin_menu')
				
				<div class="panel-body admin_content col-md-9">
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
					<h2>Все категории</h2>
					<table width=100% class="tag_table">
					@foreach ($cats as $cat)
						<tr>
							<td>
								<b>{{ $cat->cat_name }}</b>
							</td>
							<td>
								{!! Form::open(array('url' => 'admin/cat/' . $cat->cat_id, 'onsubmit' => 'return ConfirmDelete()')) !!}
								<a class="btn  btn-info" href="/admin/cat/{{ $cat->cat_id }}/edit">Редактировать</a>&nbsp;&nbsp;
				                    {!! Form::hidden('_method', 'DELETE') !!}
				                    {!! Form::submit('Удалить', array('class' => 'btn btn-warning')) !!}
				                {!! Form::close() !!}
			            	</td>
			            </tr>    
					
					@endforeach
					</table>
				</div>
				<div  class="cl" ></div>
			</div>
		</div>
	</div>
</div>
@endsection
