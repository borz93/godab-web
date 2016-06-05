<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NutritionalInfoData extends Model
{
    protected $table = 'nutritional_info_datas';

    protected $fillable = [
        'name','quantity_x','quantity_y'
    ];

    public function nutritionalInfo()
    {
        return $this->belongsTo('App\NutritionalInfo');
    }

}
