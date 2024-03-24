<?php
namespace App\Trait;
use Illuminate\Contracts\Mail\Mailable;
use App\Mail\PasswordChangedNotification;
use Illuminate\Support\Facades\Mail;

Trait UserTrait{

     //For Customize Attributes
     public function getPasswordColumn(): string
     {
        return 'password';
     }

     public function getEmailColumn(): string
     {
        return 'email';
     }

     public function pushNotificationMail():Mailable
     {
        return new PasswordChangedNotification();
     }


     public function isPasswordChanged()
     {
        return $this->wasChanged($this->getPasswordColumn());
     }

     //Is it in queque
     public function isPasswordChangedNotificationQueued():bool
     {
        return true;
     }



//Send warning to user that password changed
  public function sendEmailPasswordChangeNotification()
  {
    try{
        if( $this->isPasswordChangedNotificationQueued());
        {
            Mail::to($this->getRawOriginal($this->getEmailColumn()))->queue($this->pushNotificationMail());
            return true;
        }
        Mail::to($this->getRawOriginal($this->getEmailColumn()))->send($this->pushNotificationMail());
        return true;
    }catch(\Exception $e){

      return false;

  }
}

}

?>
