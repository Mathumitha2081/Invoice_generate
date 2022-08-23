<?php

namespace App\Jobs;

use App\Mail\InvoiceMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->(new InvoiceMail($pdf) );
    }
}
