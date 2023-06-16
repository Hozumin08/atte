<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use app\Models\User;
use app\Models\Work;

class AttendanceController extends Controller
{
    //
    public function stampStart()
    {
        return view('dashboard');
    }

    public function workstart(Request $request)
    {
        $userId = Auth::id();
        $date = date('Y-m-d');
        $workStart = date('H:i:s');
        
        DB::table('works')->insert([
            'user_id' => $userId,
            'date' => $date,
            'work_start' => $workStart,
        ]);

        return view('dashboard');
    }

    public function stampEnd()
    {
        return view('dashboard');
    }

    public function workEnd(Request $request)
    {
        $userId = Auth::id();
        $date = date('Y-m-d');
        $workEnd = date('H:i:s');
        
        DB::table('works')->where('user_id',$userId)->where('date',$date)->update
        ([
            'work_end' => $workEnd
        ]);

        return view('dashboard');
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

}