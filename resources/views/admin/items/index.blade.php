@extends('app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<p>SHOP</p>
					@include('flash::message')
					
				</div>
				@include('layout.admin_menu')
				
				<div class="panel-body admin_content col-md-9">
					<div class="panel-body filter_panel">
						
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
					@foreach ($items as $item)
						<article>
							<h2>{{ $item->title }}</h2>
							<p><b>{{ $item->price }}</b></p>
							
							
							 {!! Form::open(array('url' => 'admin/items/' . $item->item_id,'onsubmit' => 'return ConfirmDelete()')) !!}
							 <a class="btn  btn-info" href="/admin/items/{{ $item->item_id }}/edit">Редактировать</a>&nbsp;&nbsp;
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
