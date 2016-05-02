<table class="table table-responsive" id="items-table">
    <thead>
        <th>Title</th>
        <th>Slug</th>
        <th>Price</th>
        <th>Description</th>
        <th>Features</th>
        <th>Cat Id</th>
        <th>Subcat Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($items as $items)
        <tr>
            <td>{!! $items->title !!}</td>
            <td>{!! $items->slug !!}</td>
            <td>{!! $items->price !!}</td>
            <td>{!! $items->description !!}</td>
            <td>{!! $items->features !!}</td>
            <td>{!! $items->cat_id !!}</td>
            <td>{!! $items->subcat_id !!}</td>
            <td>
                {!! Form::open(['route' => ['items.destroy', $items->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('items.show', [$items->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('items.edit', [$items->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>