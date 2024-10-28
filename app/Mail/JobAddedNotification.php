<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Job;

class JobAddedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $job;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($job)
    {
        $this->job = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // echo"<pre>";
        // print_r($this->job);

        // die;
        return $this->subject('New Job Added')
                    ->view('emails.jobAdded')
                    ->with([
                        'jobTitle' => $this->job->job_title,
                        'jobDescription' => $this->job->job_description,
                    ]);
    }
}
