<tr>
    <td>{{ $session->id }}</td>
    <td>{{ $session->title }}</td>
    <td>{{ $session->sessionGenre->name }}</td>
    <td>{{ $session->user->name }}</td>
    <td>{{ $session->updated_at }}</td>
    <td>{{ $session->created_at }}</td>
    <td>
        {!! Form::open(['url'=>'admin/editar-sesion/'.$session->id, 'method' =>'GET','files'=>false]) !!}
        {!! Form::submit('Editar',['class'=>'mini btn btn-xs btn-warning']) !!}
        {!! Form::close() !!}
    </td>
    <td>
        {!! Form::open(['url'=>'admin/borrar-sesion/'.$session->id, 'method' =>'DELETE','files'=>false]) !!}
        {!! Form::submit('Eliminar',['class'=>'mini btn btn-xs btn-danger']) !!}
        {!! Form::close() !!}
    </td>
</tr>