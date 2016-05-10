<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Features Field -->
<div class="form-group col-sm-6">
    {!! Form::label('features', 'Features:') !!}
    {!! Form::text('features', null, ['class' => 'form-control']) !!}
</div>

<!-- Cat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cat_id', 'Cat Id:') !!}
    {!! Form::text('cat_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Subcat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subcat_id', 'Subcat Id:') !!}
    {!! Form::text('subcat_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('items.index') !!}" class="btn btn-default">Cancel</a>
</div>
