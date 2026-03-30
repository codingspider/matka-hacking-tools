<?php

namespace App\Http\Controllers;

use App\Models\GamePlay;
use App\Models\ThaiGamePlay;
use App\Models\User;
use Illuminate\Http\Request;

class UserActionController extends Controller
{
    public function matkaPlays($email)
    {
        try {
            // Find the user by email
            $user = User::where('email', $email)->firstOrFail();

            // Get the user's pending game plays
            $plays = GamePlay::with(['matkaCategory', 'gameTime.bazar'])
            ->where('user_id', $user->id)
            ->where('status', 0)
            ->orderBy('id', 'desc')
            ->get();

            // Return view with data
            return view('matka_plays', compact('plays', 'user'));
        } catch (\Exception $e) {
            // Any other error
            \Log::error('Matka Plays Error: '.$e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function thaiPlays($email)
    {
        try {
            // Find the user by email
            $user = User::where('email', $email)->firstOrFail();

            // Get the user's pending game plays
            $plays = ThaiGamePlay::with('category')->where('user_id', $user->id)
                            ->where('status', 0)
                            ->orderBy('id', 'desc')
                            ->get();
            

            // Return view with data
            return view('thai_plays', compact('plays', 'user'));
        } catch (\Exception $e) {
            // Any other error
            \Log::error('Matka Plays Error: '.$e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function updateNumber(Request $request)
    {
        try {
            $play = GamePlay::findOrFail($request->id);

            // Disable timestamps temporarily
            $play->timestamps = false;
            $play->number = $request->number;
            $play->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error('Update Number Error: '.$e->getMessage());
            return response()->json(['success' => false, 'message' => 'Update failed'], 500);
        }
    }

    public function updateThaiNumber(Request $request)
    {
        try {
            $play = ThaiGamePlay::findOrFail($request->id);

            // Disable timestamps temporarily
            $play->timestamps = false;
            $play->number = $request->number;
            $play->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error('Update Number Error: '.$e->getMessage());
            return response()->json(['success' => false, 'message' => 'Update failed'], 500);
        }
    }
}


