<?php

namespace App\Http\Controllers;
use App\Models\MailMe;
use File;
use Mail;
use PDF;

use App\Mail\Notification;
use Illuminate\Http\Request;

class SendMailController extends Controller
{
    

    public function mailSend(Request $request)
    {
        $input = $request->validate([
            'email' => 'required',
            'attachment' => 'required',
            'message' => 'required'
        ]);

        $path = public_path('uploads');
        $attachment = $request->file('attachment');

        $name = time().'.'.$attachment->getClientOriginalExtension();

        // create folder
        if(!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
        $attachment->move($path, $name);

        $filename = $path.'/'.$name;


        try {
            Mail::send('mail', $input, function($message)use($input){
                $message->to($input['email'], $input['email'])
                        ->subject('une notification de CRM CCA');
                $message->attach($filename);
                    
            });
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('message', 'Mail sent successfully.');
    }
}
