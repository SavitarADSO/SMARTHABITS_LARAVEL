<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DietaCreada extends Mailable
{
    use Queueable, SerializesModels;

    private $code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function _construct($code){
        $this->code = $code;
    }



    /**
     * Build the message.
     *s
     * @return $this
     */
    public function build()
    {
        $content = "<html> Hola<br>";
        $content .= "<html>Este correo es para informarte que tu dieta ha sido creda corretamente.<br>";
        $content .= "<html>Por favor ingresa a la app y verifica si tu dieta ya está a tu dispocisión. <br>";
        return $this
                    ->subject('SU DIETA HA SIDO CREADA')
                    ->html($content);
    }
}
