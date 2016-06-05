<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class SessionGenre extends Model implements SluggableInterface
{
    protected $table = 'session_genres';
    use SluggableTrait;

    protected $fillable = [
        'name', 'description', 'file_id'
    ];
    public function file()
    {
        return $this->belongsTo('App\File');
    }
    public function sessions(){
        return $this->hasMany('App\Session');
    }
    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];
}
