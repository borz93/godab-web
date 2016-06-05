<div>
    <div class="panel panel-default">
        <div class="panel-heading panel-heading-custom-title">
            <h5>Información nutricional</h5></div>
        <div class="panel-body">
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Por toma (g)</th>
                        <th>Por 100 g</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($analysi->nutritionalInfo->nutritionalInfoDatas as $data)
                    <tr class="warning">
                        <td>{{$data->name}}</td>
                        <td>{{$data->quantity_x}}</td>
                        <td>{{$data->quantity_y}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>