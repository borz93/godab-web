<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Alert;
use App\Http\Requests\AlertRequest;

class AlertController extends Controller
{
    public function index()
    {
        $alert = Alert::all();
        return view('admin.alerts.alerts',compact('alert'));
    }

    public function store(AlertRequest $request)
    {
        $alert = new Alert($request->all());
        $alert->save();
        return redirect('admin/alertas')->with('succesMessage','Alerta creada');
    }

    public function update(AlertRequest $request)
    {
        $alert = Alert::all()->first();
        $alert->update($request->all());
        return redirect('admin/alertas')->with('succesMessage','Alerta actualizada');
    }
}
