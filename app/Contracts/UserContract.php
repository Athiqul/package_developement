<?php



namespace App\Contracts;


interface UserContract{
    public function getPasswordColumn();
    public function getEmailColumn();
     public function pushNotificationMail();
    public function isPasswordChanged();
     public function isPasswordChangedNotificationQueued();
}

?>
