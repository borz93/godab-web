<div class="panel panel-default">
    <div class="panel-heading  panel-heading-custom-title">
        <h5>Filtrar</h5>
    </div>
    <div class="panel-body">
        {!! Form::open(['url' => 'analisis/'.$subproduct->product->slug.'/'.$subproduct->slug.'/filtrar', 'method' =>'get','files'=>false]) !!}
            {!! Form::hidden('subproduct',$subproduct->id) !!}
            {!! Form::label('brand', 'Marcas') !!}

                <div class="checkbox">
                    @foreach($subproduct->analysis->pluck('brand')->unique() as $brand)
                        <label>
                            <input value="{{$brand}}" type="checkbox" name="brand[]"/>
                            {{ $brand }}
                            <br>
                        </label>
                    @endforeach
                </div>
            {!! Form::label('vote', 'Nota mínima') !!}
            <div id="slider" class="slider slider-warning noUi-connect"></div>
            {!! Form::hidden('vote','') !!}
            <p id="vote-number" class="text-center"></p>
            {!! Form::submit('Filtrar', ['class' => 'btn']) !!}
        {!! Form::close() !!}
        {{link_to('analisis/'.$subproduct->product->slug.'/'.$subproduct->slug,'Todos',['class'=>'btn btn-indigo'])}}
    </div>
</div>