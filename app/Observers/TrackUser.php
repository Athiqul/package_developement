<?php

namespace App\Observers;

use App\Mail\PasswordChangedNotification;
use Illuminate\Support\Facades\Mail;

class TrackUser
{

    public function updated($model)
    {

        dd($model->getRawOriginal($model->getEmailColumn()));
        if($model->isPasswordChanged()){

            Mail::to($model->getRawOriginal($model->getEmailColumn()))->send($model->pushNotificationMail());
            return true;
        }else{
            return false;
        }


    }
}
