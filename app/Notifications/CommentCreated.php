<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentCreated extends Notification
{
  use Queueable;
    public function __construct(public $sender, public $post, public $url)
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
        'sender' => $this->sender,
        'message' => $this->sender->name . ' created a comment on your post ',
        'url' => $this->url,
      ];
    }
  }
