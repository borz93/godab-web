<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';

    protected $fillable = [
        'name', 'route', 'mimetype', 'extension', 'filesize', 'height', 'width', 'download','updated_at'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }
    public function product()
    {
        return $this->hasOne('App\Product');
    }
    public function subproduct()
    {
        return $this->hasOne('App\Subproduct');
    }
    public function post()
    {
        return $this->hasOne('App\Post');
    }
    public function analysis()
    {
        return $this->hasOne('App\Analysis');
    }
    public function article()
    {
        return $this->hasOne('App\Article');
    }
    public function sessionGenre()
    {
        return $this->hasOne('App\SessionGenre');
    }
    public function session()
    {
        return $this->hasOne('App\Session');
    }
    public function slide()
    {
        return $this->hasOne('App\SlideImage');
    }

}
