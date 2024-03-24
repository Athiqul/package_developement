<?php

namespace App\Observers;

use App\Mail\PasswordChangedNotification;
use Illuminate\Support\Facades\Mail;

class TrackUser
{

    public function updated($model)
    {


      $model->sendEmailPasswordChangeNotification();


    }
}
