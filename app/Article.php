<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

use Sofa\Eloquence\Eloquence;

class Article extends Model implements SluggableInterface
{
    protected $table = 'articles';
    use SluggableTrait,SoftDeletes,Eloquence;

    protected $fillable = [
        'title','intro','body','references','product_id','file_id','tags'
    ];
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
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
        'on_update'       => true,
    ];
}
