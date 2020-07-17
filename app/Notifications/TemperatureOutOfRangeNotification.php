<?php

namespace App\Notifications;

use Benwilkins\FCM\FcmMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TemperatureOutOfRangeNotification extends Notification
{
    use Queueable;

    public function __construct()
    {

    }

    public function via($notifiable)
    {
        return ['fcm'];
    }

    public function toFcm($notifiable)
    {
        $message = new FcmMessage();

        $message
            ->to('global', $recipientIsTopic = true)
            ->content([
                'title' => 'Temperatura fora do limite',
                'body' => 'Houve uma leitura de temperatura fora do limite!',
                'sound' => 'default',
                'icon' => 'fcm_push_icon'
            ])->priority(FcmMessage::PRIORITY_HIGH);

        return $message;
    }

    public function toArray($notifiable)
    {
        return [];
    }
}
