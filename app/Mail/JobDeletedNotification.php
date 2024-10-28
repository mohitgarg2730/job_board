<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobDeletedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $jobDetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->jobDetails = $jobDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Job Deleted Notification')
                    ->view('emails.job_deleted');
    }
}
