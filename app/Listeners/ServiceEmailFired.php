<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ServiceMail;
use App\Models\Service;
use App\Models\User;
use Mail;

class ServiceEmailFired
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
     * @param  object  $event
     * @return void
     */
    public function handle(ServiceMail $event)
    {

        $user = User::where(['role'=>'admin'])->first();
        $service = $event->service;

        $service = Service::where('service_id', $event->service->service_id)->first();
        Mail::send( 'email.service_notification', [
            'fname' => $service->fname, 
            'lname' => $service->lname,
            'section' => $service->section,
            'email' => $service->email,
            'filename' => $service->filename,
            'size' => $service->size,
            'quantity' => $service->quantity,
            'cost' => $service->cost,
            'options' => $service->options
        ], function($message) use ($service, $user) {

            $message->from($user->email, 'Admin');
    
        $message->to($service->email, $service->lname);
        $message->subject('MTICS Printing Service');
        $message->attach(public_path('/images/mtics.jpg'));
        });
    
    }
}
