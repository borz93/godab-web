@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::has('editMessage'))
    <div class="alert alert-dismissible alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4>
            <i class="fa fa-edit"></i>
        </h4>
        {{Session::get('editMessage')}}
    </div>
@endif
@if (Session::has('succesMessage'))
    <div class="alert alert-dismissible alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4>
            <i class="icon fa fa-check"></i>
        </h4>
        {{Session::get('succesMessage')}}
    </div>
@endif
@if (Session::has('deleteMessage'))
    <div class="alert alert-dismissible alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4>
            <i class="icon fa fa-trash"></i>
        </h4>
        {{Session::get('deleteMessage')}}
    </div>
@endif