<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use Mail;

class pagesController extends Controller {

	public function contact() {
		return view('pages\contact');
	}

	public function contactStore(ContactFormRequest $request) {

		Mail::send('emails.contactEmail',
			array(
				'name'         => $request->input('name'),
				'email'        => $request->input('email'),
				'user_message' => $request->input('message'),
			), function ($message) use ($request) {
				$message->from($request->input('email'), $request->input('name'));
				$message->to('dippyes@gmail.com', 'Admin')->subject('Contact feedback');
			});

		return redirect('contact')->with('message', 'Thanks for contacting me!');
	}

	public function about() {
		return view('pages.about');
	}
}
