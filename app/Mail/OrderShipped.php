<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\WellcomeEmailInfo;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $sub;
    public $mess;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$message)
    {
        $this->sub = $subject;
        $this->mess = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $wellcome_email_info = WellcomeEmailInfo::find(1);
        $e_subject = $this->sub;
        $e_message = $this->mess;
        return $this->view('emails.orders.shipped', compact("e_message","wellcome_email_info"))->subject($e_subject);
    }
}
