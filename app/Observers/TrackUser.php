<?php

namespace App\Observers;

use App\Mail\PasswordChangedNotification;
use Illuminate\Support\Facades\Mail;

class TrackUser
{

    public function updated($model)
    {


        if($model->isPasswordChanged()){

           if( $model->isPasswordChangedNotificationQueued());
            {
                Mail::to($model->getRawOriginal($model->getEmailColumn()))->queue($model->pushNotificationMail());
                return true;
            }
            Mail::to($model->getRawOriginal($model->getEmailColumn()))->send($model->pushNotificationMail());
            return true;
        }else{
            return false;
        }


    }
}
