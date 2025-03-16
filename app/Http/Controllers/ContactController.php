<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('pages.contact');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:5',
        ]);

        // Here you would typically send an email (optional)
        Mail::raw($request->message, function ($mail) use ($request) {
            $mail->to('admin@example.com')
                ->from($request->email)
                ->subject('Contact Form Message');
        });

        return redirect()->route('contact.show')->with('success', 'Message sent successfully!');
    }
}

