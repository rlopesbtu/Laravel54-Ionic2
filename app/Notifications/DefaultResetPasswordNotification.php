<?php

namespace CodeFlix\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;

class DefaultResetPasswordNotification extends ResetPassword
{

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Redefinição de senha')
            ->line('Você está recebendo este e-mail, porque uma redefinição de senha foi requisitada')
            ->action('Redefinir senha', url('password.reset',$this->token))
            ->line('Se você não requisitou isto, por favor desconsidere.');
    }


}
