<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Message;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
        {
            $subject = 'Test Email Subject';
            return $this->view('furni.mail.index')
                ->subject('Test Email Subject')
                ->with([
                    'message' => 'This is a test email from Laravel.',
                    'subject' => $subject,
                ]);
        }
    }