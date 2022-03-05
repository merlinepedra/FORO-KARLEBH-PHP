<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentCreated extends Notification
{
  use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public $sender, public $post)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
      return ['database'];
    }


    public function toArray($notifiable)
    {
      return [
        'sender' => $this->sender,
        'message' => $this->sender->name . ' created a comment on your post ' . $this->post->slug,
      ];
    }
  }
