<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationEmail;
use App\Models\Submission;

class EmailNotificationsController extends Controller
{
    public function sendNotification()
{
    // Mengambil semua submission beserta submitter dan user terkait
    $submissions = Submission::with('submitter.user')->get(); 

    foreach ($submissions as $submission) {
        // Mengirim email ke user yang terkait dengan submission
        Mail::to($submission->submitter->user->email)->send(new NotificationEmail($submission));
    }
}

}
