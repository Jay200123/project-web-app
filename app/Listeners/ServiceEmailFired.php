<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ServiceMail;
use App\Models\Service;
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
        $service = $event->service;

        $service = Service::where('service_id', $event->service->service_id)->first();
        Mail::send( 'email.service_notification', [
            'fname' => $service->fname, 
            'lname' => $service->lname,
            'section' => $service->section,
            'email' => $service->email,
            'filename' => $service->filename,
            'quantity' => $service->quantity,
            'cost' => $service->cost,
            'options' => $service->options
        ], function($message) use ($service) {
        $message->from('admin@bands.com','Admin');
    
        $message->to($service->email, $service->fname, $service->lname, $service->section);
        $message->subject('Thank you');
        $message->attach(public_path('/images/mtics.jpg'));
        });
    
    }
}
