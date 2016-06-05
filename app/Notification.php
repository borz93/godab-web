<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = [];

    public function from()
    {
        return $this->belongsTo('App\User');
    }
    public function to()
    {
        return $this->belongsTo('App\User');
    }

    public static function makeNotification($category,$body,$url = null)
    {
        $users = User::all();
        foreach($users as $user)
        {
            if($user !=Auth::user())
            {
                $notification = new Notification();
                $notification->from = Auth::user()->id;
                $notification->url = $url;
                $notification->body = $body;
                $notification->category = $category;
                $notification->to = $user->id;
                $notification->save();
            }
        }
    }

    public static function readAllNotifications($category){
        $user =Auth::user()->id;
        if($category)
        {
            $notifications = Notification::where([
                ['to',$user],
                ['read',false],
                ['category',$category]
            ])->get();

            foreach($notifications as $notification)
            {
                $notification->read=true;
                $notification->update();
            }
        }else
        {
            $notifications = Notification::where([
                ['to',$user],
                ['read',false]
            ])->get();

            foreach($notifications as $notification)
            {
                $notification->read=true;
                $notification->update();
            }
        }
    }
}
