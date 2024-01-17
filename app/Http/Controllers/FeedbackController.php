<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackSubmitted;
use App\Models\User;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('feedbacks.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $admins = User::role('ADMINISTRATION')->get();
        $adminMail = [];
        foreach ($admins as $key => $admin) {
            $adminMail[] = $admin->email;
        }

        $feedback = Feedback::create([
            'message' => $request->message,
            'user_id' => Auth::id()
        ]);

        try {
            Mail::to($adminMail)
                ->send(new FeedbackSubmitted($feedback));
        } catch (\Exception $e) {
            $response = $e->getMessage();
        }
        return redirect()->route('feedback.index')->with('success', 'Merci pour votre commentaire');
    }
}
