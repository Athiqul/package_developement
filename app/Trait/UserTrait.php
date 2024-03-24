<?php
namespace App\Trait;
use Illuminate\Contracts\Mail\Mailable;
use App\Mail\PasswordChangedNotification;

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
}

?>
