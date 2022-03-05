<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LikeNotification extends Notification
{
  use Queueable;

  public function __construct(public $likeable_id, public $likeable_type, public $likeable = null)
  {
        //
  }

  public function via($notifiable)
  {
    return ['database'];
  }

  
  public function toArray($notifiable)
  {
    return [
      'likeable_id' => $this->likeable_id,
      'likeable_type' => $this->likeable_type,
      'liker' => auth()->user(),
      'likeable' => $this->likeable,
    ];
  }
}
