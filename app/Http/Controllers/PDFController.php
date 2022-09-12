<?php
  
namespace App\Http\Controllers;
  
use PDF;
use Mail;

use File;


use Illuminate\Http\Request;

class PDFController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        $request->validate([ 
            'email' => 'required',
            'attachment' => 'required',
            'message'=>'required'
        ]);

        $data["message"] = $request->message;
        $data["email"] = $request->email;
        
        $path = public_path('uploads');
        $attachment = $request->file('attachment');
        $name = time().'.'.$attachment->getClientOriginalExtension();

         // create folder
         if(!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
        $attachment->move($path, $name);

        $filename = $path.'/'.$name;

        $data['filename'] = $filename;

  
        Mail::to($data['email'])
            ->send(new \App\Mail\MyTestMail($data));

        return redirect()->back()->with('message', 'Mail sent successfully.');
    }
}