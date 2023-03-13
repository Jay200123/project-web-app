<?php

namespace App\Listeners;

use App\Events\ServiceMessageMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Service;
use App\Models\User;
use Mail;

class MessageEmailFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ServiceMessageMail  $event
     * @return void
     */
    public function handle(ServiceMessageMail $event)
    {
        $user = User::where(['role'=>'admin'])->get();
        $service = $event->service;

        $service = Service::where('service_id', $event->service->service_id)->first();
        Mail::send( 'email.message_notification', [
            'fname' => $service->fname, 
            'lname' => $service->lname,
            'section' => $service->section, 

        ], function($message) use ($service, $user) {
            foreach($user as $user)
            $message->from($user->email, 'Admin');
    
        $message->to($service->email, $service->lname);
        $message->subject('Thank you');
        $message->attach(public_path('/images/mtics.jpg'));
        });

    }
}
