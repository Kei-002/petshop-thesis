<?php

namespace App\Listeners;

use App\Events\ConsultMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Consultation;
use App\Models\Customer;
use App\Models\Pet;
use App\Models\User;
use Mail;
use App\Models\Disease;

class ConsultMailFired
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
     * @param  \App\Events\ConsultMail  $event
     * @return void
     */
    public function handle(ConsultMail $event)
    {
        $consult = $event->consult;
        // dd($consult,$consult['pet_id'], $event,$consult['created_at']);

        $customerid = Pet::where('id',$consult['pet_id'])->first();
        $empid = Customer::where('id',$customerid->customer_id)->first();
        $user = User::where('id',$empid->user_id)->first();
        $disease = Disease::where('id',$consult['disease_id'])->first();
        $commt = $consult['comments'];
        
         //dd($commt);

            Mail::send( 'email.consult_notification', ['name' => $user->name, 'email' => $user->email, 'disease' => $disease->disease_name, 'comment' => $commt, 'petname' => $customerid->pet_name,'consultdate' => $consult['created_at'],'consultfee' => $consult['fee']], function($message) use ($user) {
            $message->from('sst.admin@admin.com','Admin');
            $message->to($user->email, $user->name);
            $message->subject('Thank You! for Availing');
            $message->attach(public_path('images/logo.png'));
        });
    }
}

