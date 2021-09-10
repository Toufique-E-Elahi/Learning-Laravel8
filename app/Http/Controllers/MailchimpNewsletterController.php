<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class MailchimpNewsletterController extends Controller
{
    //
    /**
     * @throws ValidationException
     */
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate([
            'email' => 'required|email',
        ]);

        try {
            $response= $newsletter->subscribe(request('email'));
        } catch (\Exception $e)
        {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added',
            ]);
        }
        return redirect('/posts')->with('success', 'your email is added for subscription');
    }
}
