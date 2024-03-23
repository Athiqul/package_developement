<?php

namespace App\Observers;

use App\Mail\PasswordChangedNotification;
use Illuminate\Support\Facades\Mail;

class TrackUser
{
    public function updated($model)
    {
        if($model->wasChanged('password')){

            Mail::to($model->email)->send(new PasswordChangedNotification($model->name,$model->updated_at));
            return true;
        }else{
            return false;
        }


    }
}
