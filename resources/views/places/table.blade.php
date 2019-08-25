<div class="table-responsive">
    <table class="table" id="places-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Descripcion</th>
        <th>Url</th>
        <th>Celular</th>
        <th>Longitud</th>
        <th>Latitud</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($places as $place)
            <tr>
                <td>{!! $place->nombre !!}</td>
            <td>{!! $place->descripcion !!}</td>
            <td>{!! $place->url !!}</td>
            <td>{!! $place->celular !!}</td>
            <td>{!! $place->longitud !!}</td>
            <td>{!! $place->latitud !!}</td>
                <td>
                    {!! Form::open(['route' => ['places.destroy', $place->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('places.show', [$place->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('places.edit', [$place->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
