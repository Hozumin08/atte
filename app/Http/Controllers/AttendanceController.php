<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use app\Models\User;
use app\Models\Work;
use app\Models\BreakTime;
use carbon\carbon;

class AttendanceController extends Controller
{
    public function timestamp()
    {
        $userId = Auth::id();
        $date = date('Y-m-d');
        $workData = DB::table('works')
                    ->where('user_id',$userId)
                    ->where('date',$date)
                    ->first();

        if($workData === null){
            return view('workstart');
        }elseif($workData !== null && $workData->work_end !== null){
            return view('workfinish');
        }else{
            $workId = DB::table('works')
            ->where('user_id',$userId)
            ->where('date',$date)
            ->where('work_end',null)
            ->first()
            ->id;
            $breakData = DB::table('breaks')
            ->where('work_id',$workId)
            ->where('break_end',null)
            ->first();
        }
        if($breakData !== null){
            return view('breakend');
        }else{
            return view('workend');
        }
    }
    public function stampStart()
    {
        return view('workstart');
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

        return view('workend');
    }

    public function stampEnd()
    {
        return view('workend');
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

        return view('workfinish');
    }

    public function index(Request $request)
    {
        $dt = new Carbon();
        $today = $dt -> copy() -> format('Y-m-d');
        if($request->input('date') == null){
            $checkDate = $today;
        }else{
            $requestDate = Carbon::parse($request->input('date'))->format('Y-m-d');
            if($today == $requestDate){
                $checkDate = $today;
            }
            else{$checkDate = $requestDate;
            }
        }
        $viewDate = Carbon::parse($checkDate);
        $users = User::select([
            'user.name',
            'work.date',
            'work.work_start',
            'work.work_end',
            DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(break.break_end,break.break_start)))) as break_time'),

            DB::raw('SEC_TO_TIME(TIME_TO_SEC(TIMEDIFF(work.work_end, work.work_start)) - SUM(TIME_TO_SEC(TIMEDIFF(break.break_end,break.break_start)))) as work_time')
        ])
        ->from('users as user')
        ->join('works as work', function($join) {
        $join->on('user.id', '=', 'work.user_id');
        })
        ->leftjoin('breaks as break', function($join) {
        $join->on('work.id', '=', 'break.work_id');
        })
        ->where('date',$viewDate)
        ->orderBy('date','asc') 
        ->groupBy('user.id', 'user.name', 'work.date', 'work.work_start', 'work.work_end')
        ->paginate(5);
        return view('attendance',['viewDate'=>$viewDate, 'users'=>$users]);
    }

    public function postIndex(Request $request)
    {
        $viewDate = Carbon::parse($request->input('date'));

        $users = User::select([
            'user.name',
            'work.date',
            'work.work_start',
            'work.work_end',
            DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(break.break_end,break.break_start)))) as break_time'),
            DB::raw('SEC_TO_TIME(TIME_TO_SEC(TIMEDIFF(work.work_end, work.work_start)) - SUM(TIME_TO_SEC(TIMEDIFF(break.break_end,break.break_start)))) as work_time'),
        ])
        ->from('users as user')
        ->join('works as work', function($join) {
        $join->on('user.id', '=', 'work.user_id');
        })
        ->leftjoin('breaks as break', function($join) {
        $join->on('work.id', '=', 'break.work_id');
        })
        ->where('date',$viewDate)
        ->orderBy('date','asc') 
        ->groupBy('user.id', 'user.name', 'work.date', 'work.work_start', 'work.work_end')
        ->paginate(5);
        return view('attendance',['viewDate'=>$viewDate, 'users'=>$users]);
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
