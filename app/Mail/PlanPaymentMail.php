<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PlanPaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $planDetails;

    public function __construct($planDetails)
    {
        $this->planDetails = $planDetails;
    }

    public function build()
    {
        return $this->view('emails.plan_payment')
                    ->subject('Payment and Plan Details')
                    ->with('planDetails', $this->planDetails);
    }
}
