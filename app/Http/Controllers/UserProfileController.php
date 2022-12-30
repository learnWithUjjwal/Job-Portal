<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $req)
    {
        Profile::where('user_id', Auth()->user()->id)->update([
            'address' => request('address'),
            'bio' => request('bio'),
            'experience' => request('experience'),
        ]);
        return redirect()->back()->with('status', 'Profile updated successfully');
    }

    public function updateCoverLetter(Request $req)
    {
        $coverLetter = $req->file('cover_letter')->store('public/files');

        Profile::where('user_id', auth()->id())->update([
            'cover_letter' => $coverLetter
        ]);
        return redirect()->back()->with('status', 'Cover Letter updated successfully');
    }

    public function updateResume(Request $req)
    {
        $resume = $req->file('resume')->store('public/files');

        Profile::where('user_id', auth()->id())->update([
            'resume' => $resume
        ]);
        return redirect()->back()->with('status', 'Resume updated successfully');
    }

    public function updateAvatar(Request $req)
    {
        if($req->hasFile('avatar')){
            $avatar = $req->file('avatar')->store('public/files');
    
            Profile::where('user_id', auth()->id())->update([
                'avatar' => $avatar
            ]);
            return redirect()->back()->with('status', 'Avatar updated successfully');
        }
    }
}
