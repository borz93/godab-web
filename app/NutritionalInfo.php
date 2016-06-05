<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NutritionalInfo extends Model
{
    protected $table = 'nutritional_infos';
    protected $fillable = [];

    public function analysis()
    {
        return $this->belongsTo('App\Analysis');
    }

    public function nutritionalInfoDatas()
    {
        return $this->hasMany('App\NutritionalInfoData');
    }
}
