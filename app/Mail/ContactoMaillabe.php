<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactoMaillabe extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public string $nombre, public string $email, public string $contenido, public array $imagenes, public string $categoria)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->email, $this->nombre),
            subject: 'Contacto tienda - ' . now()->timestamp,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'plantillasmail.contacto',
            with: [
                'nombre' => $this->nombre,
                'email' => $this->email,
                'contenido' => $this->contenido,
                'imagenes' => $this->imagenes, 
                'categoria' => $this->categoria
            ],
        );
    }

    public function attachments(): array
    {
        $attachments = [];
        foreach ($this->imagenes as $imagen) {
            if ($imagen->isValid()) {
                $attachments[] = \Illuminate\Mail\Mailables\Attachment::fromPath($imagen->getRealPath(), [
                    'as' => $imagen->getClientOriginalName(),
                    'mime' => $imagen->getMimeType(),
                ]);
            }
        }
        return $attachments;
    }

    public function build()
    {
        $email = $this->view('plantillasmail.contacto')
                      ->with([
                          'nombre' => $this->nombre,
                          'email' => $this->email,
                          'contenido' => $this->contenido,
                          'imagenes' => $this->imagenes,
                          'categoria' => $this->categoria,
                      ])
                      ->subject('Contacto tienda - ' . now()->timestamp)
                      ->withSwiftMessage(function ($message) {
                          $message->getHeaders()->addTextHeader('X-Custom-Message-ID', $this->generateMessageId());
                      });

        foreach ($this->imagenes as $imagen) {
            if ($imagen->isValid()) {
                $email->attach($imagen->getRealPath(), [
                    'as' => $imagen->getClientOriginalName(),
                    'mime' => $imagen->getMimeType(),
                ]);
            }
        }

        return $email;
    }

    private function generateMessageId(): string
    {
        return '<' . uniqid() . '@yourdomain.com>';
    }
}
