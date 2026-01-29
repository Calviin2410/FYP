<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends BaseController
{
    public function sendContact(Request $request)
    {
        try {
            /* Mail::send('emails.contact', $emailData, function ($mail) use ($emailData) {
                $mail->to('support@example.com') // Replace with your support email
                     ->from($emailData['email'], $emailData['name'])
                     ->subject($emailData['subject']);
            }); */

            return $this->sendResponse([], 'Your message has been sent successfully!');

        } catch (\Exception $e) {
            return $this->sendError('Failed to send email. Please try again later.');
        }
    }
}
