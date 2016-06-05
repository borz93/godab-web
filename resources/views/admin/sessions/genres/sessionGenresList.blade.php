@extends('admin.layouts.master')
@section('page-title', 'Lista de géneros')
@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- general form elements -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Lista de géneros musicales actualmente en la web</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('admin.layouts.messages')
                    <div class="row items-container">
                        @if(count($session_genres)>0)
                            @foreach ($session_genres->chunk(3) as $chunk)
                                <div class="row">
                                    @each('admin.sessions.genres.layouts.previews.genres',$session_genres,'session_genre')
                                </div>
                            @endforeach
                        @else
                            <div class="box-body">
                                <div class="callout callout-warning" role="alert">
                                    <p>No existen géneros aun. Para ello, cree uno.</p>
                                    {{link_to_action('Admin\SessionGenreController@create','Crear género')}}
                                </div>
                            </div>
                        @endif
                        {!! $session_genres->render() !!}
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('/js/jquery.matchHeight.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $('.items-container').each(function() {
            $(this).children('.item').matchHeight({
                byRow:true
            });
        });
    </script>
@endsection