<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function index(){
        return view('frontend.pages.home.index');
    }
    public function portfolio_details($id)
    {
        $portfolio = Portfolio::find($id);
        return view('frontend.pages.components.portfolio_details', compact('portfolio'));
    }
    public function contact(Request $request){
        $this->validate($request, [
            'name'      => 'required',
            'email'      => 'required',
            'subject'      => 'required',
            'message'      => 'required',

        ]);

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::send('frontend.emails.contactMail', $data, function($mail) use ($data){
            $mail->from($data['email'], $data['name']);
            $mail->to('atiq@softscholar.com');
            $mail->subject($data['subject']);
        });

        /*$guestcontact = new Contact();
        $guestcontact->name = $data['name'];
        $guestcontact->subject = $data['subject'];
        $guestcontact->email = $data['email'];
        $guestcontact->message = $data['bodyMessage'];
        $guestcontact->sent_to = 'atiq@hiya-it.com';
        $guestcontact->save();*/

        return back()->with('success', 'Your mail has been sent. You will be notify soon');
    }


}
