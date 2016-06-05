<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model implements SluggableInterface
{
    protected $table = 'sessions';
    use SluggableTrait,SoftDeletes;
    protected $fillable = [
        'title', 'video', 'body', 'file_id','session_genre_id','tags'
    ];
    protected $dates = ['deleted_at'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function file()
    {
        return $this->belongsTo('App\File');
    }
    public function sessionGenre()
    {
        return $this->belongsTo('App\SessionGenre');
    }
    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];
}
