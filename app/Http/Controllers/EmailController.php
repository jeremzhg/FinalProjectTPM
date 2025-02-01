<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        
        $recipientEmail = 'technoevent@bncc.net'; 

        Mail::to($recipientEmail)->send(new ContactEmail($request->name, $request->email, $request->subject, $request->message));
        
        return redirect('/')->with('success', 'Email sent successfully!');
    }
}
