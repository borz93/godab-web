@extends('admin.layouts.master')
@section('page-title', 'Mensaje de alerta')
@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Mensaje de alerta mostrado en la página de inicio</h3>
                </div>
                @include('admin.layouts.messages')
                @if(isset($alert) && !$alert->isEmpty())
                    @include('admin.alerts.layouts.existalert')
                @else
                    @include('admin.alerts.layouts.noexistalert')
                @endif
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection