<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Annonce;
use App\User;

class AddPost extends Notification
{
    use Queueable;
     
    protected $annonce; 
    public function __construct(Annonce $annonce)
    {
        $this->annonce = $annonce;
    }

    
    public function via($notifiable)
    {
        return ['database'];
    }

 
  
    public function toArray($notifiable)
    {
        return [
           'data' => 'une nouvelle annonce ajouter' .$this->annonce->title ." <br> ajouter par" .auth()->user()->name
        ];
    }
}
