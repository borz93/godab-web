<div class="panel panel-default contentindex-panel">
    <div class="panel-heading  panel-heading-custom-title">
        <h5>Índice</h5>
    </div>
    <div class="panel-body">
        <ul class="list-unstyled">
        @foreach($referencesarray as $x => $name)
            <li>{{link_to('#'.$x, $name)}}</li>
         @endforeach
        </ul>
    </div>
</div>