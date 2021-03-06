@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Items</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($items, ['route' => ['items.update', $items->id], 'method' => 'patch']) !!}

            @include('items.fields')

            {!! Form::close() !!}
        </div>
@endsection