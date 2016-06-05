<div id="carousel-preview" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @for($i=0;$i<count($slides);$i++)
            <li data-target="#carousel-preview" data-slide-to="{!! $i !!}" class="@if($i ==0) active @endif"></li>
        @endfor
    </ol>
    <div class="carousel-inner" role="listbox">
        @for($i=0;$i<count($slides);$i++)
            <div class="item @if($i ==0) active @endif">
                <img src="{{url("image/cache/original/".$slides[$i]->file->name)}}" alt="{{$slides[$i]->file->name}}">
                <div class="container">
                    <div class="carousel-caption">
                        <h2>{!! $slides[$i]->name !!}</h2>
                        <p>{{link_to($slides[$i]->url,'Ver',['class'=>'btn btn-raised btn-xs btn-warning'])}}</p>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    <a class="left carousel-control" href="#carousel-preview" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#carousel-preview" data-slide="next">
        <span class="icon-next"></span>
    </a>
</div>