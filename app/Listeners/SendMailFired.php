<?php

namespace App\Listeners;

use App\Events\SendMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Mail;

class SendMailFired
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
     * @param  \App\Events\SenMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
         // dd($event->listener->id);
         $user = $event->user;
        
         $user = User::where('id',$event->user->id)->first();

            Mail::send( 'email.user_notification', ['name' => $user->name, 'email' => $user->email], function($message) use ($user) {
            $message->from('sst.admin@admin.com','Admin');
              //dd($customer);
              //dd($user);
            $message->to($user->email, $user->name);
            $message->subject('New Customer! Welcome!');
            $message->attach(public_path('images/logo.png'));

          });
    }
}
