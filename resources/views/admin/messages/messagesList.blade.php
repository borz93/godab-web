@extends('admin.layouts.master')
@section('page-title', 'Lista de mensajes')
@section('content')
<div class='row'>
    <div class='col-md-12'>

        <div class="box box-info box-solid direct-chat direct-chat-info">

            <div class="box-header">
                <h3 class="box-title">Lista de mensajes</h3>
            </div>
            <div class="box-body ">

                <div id="chat-messages" class="direct-chat-messages">

                    @foreach($messages as $message)

                        @if($message->user_id == Auth::user()->id)

                            <div class="direct-chat-msg right">
                                <div class="direct-chat-info clearfix">
                                    <span class="direct-chat-name pull-right">{{$message->user->name}}</span>
                                    <span class="direct-chat-timestamp pull-left">{{date('H\h:m\m d-m-Y', strtotime($message->created_at))}}</span>
                                </div><!-- /.direct-chat-info -->
                                <img class="direct-chat-img" src="{{ url("image/cache/small/".$message->user->file->name)}}" alt="{{$message->user->file->name}}">
                                <div class="direct-chat-text">
                                    {{$message->body}}
                                </div><!-- /.direct-chat-text -->
                            </div>

                        @else

                            <div class="direct-chat-msg">
                                <div class="direct-chat-info clearfix">
                                    <span class="direct-chat-name pull-left">{{$message->user->name}}</span>
                                    <span class="direct-chat-timestamp pull-right">{{date('H\h:m\m d-m-Y', strtotime($message->created_at))}}</span>
                                </div><!-- /.direct-chat-info -->
                                <img class="direct-chat-img" src="{{ url("image/cache/small/".$message->user->file->name)}}" alt="{{$message->user->file->name}}">
                                <div class="direct-chat-text">
                                    {{$message->body}}
                                </div><!-- /.direct-chat-text -->
                            </div>

                        @endif

                    @endforeach

                </div>
                <div class="box-footer">
                    {!! Form::open(['url'=>'admin/guardar-mensaje/', 'method' =>'POST','files'=>false]) !!}
                    <div class="input-group">
                        {!! Form::text('body',null,['class'=>'form-control','placeholder' => 'Escribe un mensaje...']) !!}
                        <span class="input-group-btn">
                            {!! Form::submit('Enviar',['class'=>'btn btn-danger btn-flat']) !!}
                        </span>
                    </div>
                    {!! Form::close() !!}
                </div><!-- /.box-footer-->

            </div>

        </div>

    </div>
</div>
@endsection
@section('javascript')
    <script type="text/javascript">
//        var objDiv = document.getElementById("chat-messages");
//        objDiv.scrollTop = objDiv.scrollHeight;
        $("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
    </script>
@endsection