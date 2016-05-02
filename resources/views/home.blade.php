@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>
				@include('flash::message')
				<div class="panel-body">
					Это главная страница.
					 Тут мы заебеним разные прикольные фишечки:)
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
