<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Product extends Model implements SluggableInterface
{
    use SluggableTrait;
    protected $table = 'products';
    protected $fillable = [
        'name' ,'description', 'file_id'
    ];
    public function file()
    {
        return $this->belongsTo('App\File');
    }
    public function analysis(){
        return $this->hasMany('App\Analysis');
    }
    public function subproducts(){
        return $this->hasMany('App\Subproduct');
    }
    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
        'on_update'       => true,
    ];
}
