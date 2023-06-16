<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use app\Models\User;
use app\Models\Work;

class BreakController extends Controller
{
    //
    public function stampBreakStart()
    {
        return view('dashboard');
    }

    public function breakstart(Request $request)
    {
        $userId = Auth::id();
        $date = date('Y-m-d');
        $workId = DB::table('works')
            ->where('user_id',$userId)
            ->where('date',$date)
            ->where('work_end',null)
            ->first()
            ->id;
        $breakStart = date('H:i:s');
        DB::table('breaks')->insert([
            'work_id' => $workId,
            'break_start' => $breakStart
        ]);

        return view('dashboard');
    }

    public function breakEnd(Request $request)
    {
        $userId = Auth::id();
        $date = date('Y-m-d');
        $workId = DB::table('works')
            ->where('user_id',$userId)
            ->where('date',$date)
            ->where('work_end',null)
            ->first()
            ->id;
        $breakEnd = date('H:i:s');
        
        DB::table('breaks')
            ->where('work_id',$workId)
            ->where('break_end',null)->update([
            'break_end' => $breakEnd
        ]);

        return view('dashboard');
    }
}
