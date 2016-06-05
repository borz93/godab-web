<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlideImage extends Model
{
    protected $table = 'slide_images';

    protected $fillable = [
        'name', 'url', 'file_id'
    ];

    public function file()
    {
        return $this->belongsTo('App\File');
    }
}
