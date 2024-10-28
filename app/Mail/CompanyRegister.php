<?php

namespace App\Mail;



namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;



class CompanyRegister extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function build()
    {


    
        $user = User::where('email', $this->data['email'])->first()->toArray();

        $encrypted_data = base64_encode($user['email']);
        $url = route('email.verify', $encrypted_data);

        // print_r($encrypted_data);
        // $encrypted_data = base64_decode($encrypted_data);


        // print_r($encrypted_data);
        // die;
        return $this->from(env('MAIL_FROM_EMAIL'))
                    ->subject('Test Email')
                    ->view('mails.register',['data'=>$this->data,'url'=> $url]);
    }
}
