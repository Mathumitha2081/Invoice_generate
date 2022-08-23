<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($totalprices,$count,$invoice_summary, $email,$message,$pdf)
    {
        $this->totalprices=$totalprices;
        $this->count=$count;
        $this->invoice_summary=$invoice_summary;
        $this->email=$email;
        $this->message=$message;
        $this->pdf=$pdf;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.InvoiceMail')
        ->with('pdf',$this->pdf,'count',$this->count,'invoice_summary',$this->invoice_summary,'pdf',$this->pdf);
    }
}
