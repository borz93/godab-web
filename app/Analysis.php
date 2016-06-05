<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jedrzej\Searchable\SearchableTrait;

use Sofa\Eloquence\Eloquence;

class Analysis extends Model implements SluggableInterface
{
    protected $table = 'analysis';
    use SluggableTrait,SoftDeletes,Eloquence;
    use SearchableTrait;

    protected $fillable = [
        'brand' ,'title', 'intro', 'body','vote', 'subproduct_id', 'file_id', 'slug', 'tags'
    ];
    public $searchable = ['brand', 'title', 'vote', 'created_at'];
    protected $searchableColumns = ['title', 'body', 'tags'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function file()
    {
        return $this->belongsTo('App\File');
    }
    public function subproduct()
    {
        return $this->belongsTo('App\Subproduct');
    }
    public function nutritionalInfo()
    {
        return $this->hasOne('App\NutritionalInfo');
    }
    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
        'on_update'       => true,
    ];
}
