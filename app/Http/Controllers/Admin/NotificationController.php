<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Notification;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{

    /**
     * @param null $category
     * @return mixed
     */
    public function countNotifications($category = null)
    {
        $user = Auth::user()->id;
        if($category)
        {
            return Notification::where([
                ['to',$user],
                ['category',$category]
            ])->count();
        }else
        {
            return Notification::where('to',$user)->count();
        }
    }

    public function countNotificationNoRead($category = null)
    {
        $user = Auth::user()->id;
        if($category)
        {
            return Notification::where([
                ['to',$user],
                ['category',$category],
                ['read',false]
            ])->count();
        }else
        {
            return Notification::where([
                ['to',$user],
                ['read',false]
            ])->count();
        }
    }

    public function getAllNotifications($category = null)
    {
        $user = Auth::user()->id;
        if($category)
        {
            $notifications = Notification::where([
                ['to',$user],
                ['category',$category]
            ])->orderBy('created_at','desc')->get();
            return $notifications;
        }else
        {
            $notifications = Notification::where('to',$user)->orderBy('created_at','desc')->get();
            return $notifications;
        }
    }

    public function getAllNotificationsNoRead($category = null)
    {
        $user = Auth::user()->id;
        if($category)
        {
            $notifications = Notification::where([
                ['to',$user],
                ['category',$category],
                ['read',false]
            ])->orderBy('created_at','desc')->get();
            return $notifications;
        }else
        {
            $notifications = Notification::where([
                ['to',$user],
                ['read',false]
                ])->orderBy('created_at','desc')->get();
            return $notifications;
        }
    }

    /**
     * @param $id
     * @return string
     */
    public function getNotification($id)
    {
        $user = Auth::user()->id;
        $notification =  Notification::where([
            ['to',$user],['id',$id]
        ])->get();
        if($notification)
        {
            return $notification;
        }else
        {
            return 'No existe';
        }
    }

    public function getFirstNotificationNoRead($category)
    {
        $user = Auth::user()->id;
        if($category)
        {
            $notification = Notification::where([
                ['to',$user],
                ['category',$category],
                ['read',false],
            ])->orderBy('created_at','desc')->first();
            return $notification;
        }else
        {
            $notification = Notification::where([
                ['to',$user],
                ['category',$category],
            ])->orderBy('created_at','desc')->first();
            return $notification;
        }
    }
}
