<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Subproduct extends Model implements SluggableInterface
{
    use SluggableTrait;
    protected $table = 'subproducts';
    protected $fillable = [
        'name' ,'description', 'product_id', 'file_id', 'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function file()
    {
        return $this->belongsTo('App\File');
    }
    public function analysis()
    {
        return $this->hasMany('App\Analysis');
    }
    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
        'on_update'       => true,
    ];



}
