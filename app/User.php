<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Sofa\Eloquence\Eloquence;

class User extends Authenticatable
{

    protected $table = 'users';
    use Eloquence;
    public function file()
    {
        return $this->belongsTo('App\File');
    }
    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function analysis()
    {
        return $this->hasMany('App\Analysis');
    }
    public function articles()
    {
        return $this->hasMany('App\Articles');
    }
    /*
     * Check if the user have a vatar image, if not, use a default image
     */
    public function avatarAction()
    {

        if ($this->attributes['file_id']){
            $aux = $this->file;
            return $aux->name;
        }else{
            
            return "any_image_profile.png";
        }
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','file_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }



}
