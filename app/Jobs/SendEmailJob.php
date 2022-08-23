<?php

namespace App\Jobs;

use App\Mail\SendInvoiceMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

     protected $email;
     protected $totalprices;
     protected $invoice_summary;
     protected $data;
     protected $count;





    public function __construct($email,$totalprices,$invoice_summary,$count,$data)
    {
        $this->email=$email;
        $this->totalprices=$totalprices;
        $this->invoice_summary=$invoice_summary;
        $this->count=$count;
        $this->data=$data;


    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new SendInvoiceMail($this->totalprices,$this->invoice_summary,$this->count,$this->data));

    }
}
