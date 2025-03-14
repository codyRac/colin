<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InterestFormMail;
class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validate form input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
        ]);

        // Get all admin users
        $admins = User::role('admin')->pluck('email');

        // Send email to all admins
        Mail::to($admins)->send(new InterestFormMail($validated));

        return back()->with('success', 'Interest form submitted successfully.');
    }
}
