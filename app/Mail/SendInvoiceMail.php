<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;


    protected $totalprices;
    protected $invoice_summary;
    protected $data;
    protected $count;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construc($totalprices,$invoice_summary,$count,$data)
    {
        $this->totalprices=$totalprices;
        $this->invoice_summary=$invoice_summary;
        $this->count=$count;
        $this->data=$data;

    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.InvoiceBill')
        ->with('totalprices',$this->totalprices)
        ->with('invoice_summary',$this->invoice_summary)
        ->with('count',$this->count)
        ->with('data',$this->data);

    }
}
