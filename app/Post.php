<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

use Sofa\Eloquence\Eloquence;


class Post extends Model implements SluggableInterface
{
    protected $table = 'posts';
    use SluggableTrait,SoftDeletes,Eloquence;

    protected $fillable = [
        'title', 'body', 'slug','tags'
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

    protected $searchableColumns = ['title', 'body', 'tags'];

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
        'on_update'       => true,
    ];
}
