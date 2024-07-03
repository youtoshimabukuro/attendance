<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Time;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;
use Vtiful\Kernel\Format;

class AtteController extends Controller
{
    public function stamp(Request $request)
    {
        $user = $request->user();
        $times = Carbon::now();
        $date = $times->format('Y-m-d');
        $item = Time::where('user_id', $user['id'])->where('date', $date)->first();

        if ($item!=null) {

            if ($item['attendance']==null) {
                $timeIn_color = "color:;";
            } else {
                $timeIn_color = "color:burlywood;";
            }

            if ($item['leaving']==null) {
                $timeOut_color = "color:;";
            } else {
                $timeOut_color = "color:burlywood;";
            }

            if ($item['breakIn']==null) {
                $breakIn_color = "color:;";
            } else {
                $breakIn_color = "color:burlywood;";
            }

            if ($item['breakOut']==null) {
                $breakOut_color = "color:;";
            } else {
                $breakOut_color = "color:burlywood;";
            }
    
        } else {
            $timeIn_color = "color:;";
            $timeOut_color = "color:;";
            $breakIn_color = "color:;";
            $breakOut_color = "color:;";
        }

        return view('stamp',compact('timeIn_color'),compact('timeOut_color'),compact('breakIn_color'));
    }

    public function dates(Request $request)
    {
        $request->name;
    }

    public function timeIn(Request $request)
    {
        $user = $request->user();
        $times = Carbon::now();
        $time = $times->format('H:i');
        $date = $times->format('Y-m-d');
        $item = Time::where('user_id', $user['id'])->where('date', $date)->first();
        //dd($item);
        if ($item == null) {
            $form = [
                'user_id' => $user['id'],
                'date' => $date,
                'name' => $user['name'],
                'attendance' => $time,
            ];
            Time::create($form);
            //dd($item);
        } else {
            if ($date == $item['date']) {
                $form = [
                    'attendance' => $time,
                ];
                Time::find($item['id'])->update(($form));
                //dd($item['id']);
            } else {
                $form = [
                    'user_id' => $user['id'],
                    'date' => $date,
                    'name' => $user['name'],
                    'attendance' => $time,
                ];
                Time::create($form);
            }
        }

        return redirect('attendance');
    }

    public function timeOut(Request $request)
    {
        $user = $request->user();
        $times = Carbon::now();
        $time = $times->format('H:i');
        $date = $times->format('Y-m-d');
        $item = Time::where('user_id', $user['id'])->where('date', $date)->first();
        $attendance = Carbon::parse($item['date'] . "" . $item['attendance']);
        $work = $times->diffInMinutes($attendance);
        $actual_workTime = $work - $item['breakTime'];
        $timeMinutes = 0;
        $timeSeconds = $actual_workTime;
        if ($actual_workTime > 59) {
            $timeMinutes = floor($actual_workTime / 60);
            $timeSeconds = floor($actual_workTime % 60);
        }
        $workTimes = Carbon::parse($timeMinutes . ":" . $timeSeconds);
        $workTime = $workTimes->format("H:i");
        if ($item == null) {
            $form = [
                'user_id' => $user['id'],
                'date' => $date,
                'name' => $user['name'],
                'leaving' => $time,
                'workTime' => $workTime,
            ];
            //Time::create($form);
            dd($item);
        } else {
            if ($date == $item['date']) {
                $form = [
                    'leaving' => $time,
                    'workTime' => $workTime,
                ];
                Time::find($item['id'])->update(($form));
            } else {
                $form = [
                    'user_id' => $user['id'],
                    'date' => $date,
                    'name' => $user['name'],
                    'leaving' => $time,
                    'workTime' => $workTime,
                ];
                Time::create($form);
            }
        }

        return redirect('attendance');
    }

    public function breakIn(Request $request)
    {
        $user = $request->user();
        $times = Carbon::now();
        $time = $times->format('H:i');
        $date = $times->format('Y-m-d');
        $item = Time::where('user_id', $user['id'])->where('date', $date)->first();
        //dd($item);
        if ($item == null) {
            $form = [
                'user_id' => $user['id'],
                'date' => $date,
                'name' => $user['name'],
                'breakIn' => $time,
            ];
            Time::create($form);
            //dd($item);
        } else {
            if ($date == $item['date']) {
                $form = [
                    'breakIn' => $time,
                ];
                Time::find($item['id'])->update(($form));
                //dd($item['id']);
            } else {
                $form = [
                    'user_id' => $user['id'],
                    'date' => $date,
                    'name' => $user['name'],
                    'breakIn' => $time,
                ];
                Time::create($form);
            }
        }

        return redirect('attendance');
    }

    public function breakOut(Request $request)
    {
        $user = $request->user();
        $times = Carbon::now();
        $time = $times->format('H:i');
        $date = $times->format('Y-m-d');
        $item = Time::where('user_id', $user['id'])->where('date', $date)->first();
        $breakIn = Carbon::parse($item['date'] . "" . $item['breakIn']);
        $breakTimes = $times->diffInMinutes($breakIn);
        $breakTime = $item['breakTime'] + $breakTimes;
        $breakMinutes = 0;
        $breakSeconds = $breakTime;
        if ($breakTime > 59) {
            $breakMinutes = floor($breakTimes / 60);
            $breakSeconds = floor($breakTimes % 60);
        }
        $breakOuts = Carbon::parse($breakMinutes . ":" . $breakSeconds);
        $breakOut = $breakOuts->format("H:i");
        if ($item['breakIn'] != '00:00:00') {
            if ($item == null) {
                $form = [
                    'user_id' => $user['id'],
                    'date' => $date,
                    'name' => $user['name'],
                    'breakIn' => "",
                    'breakOut' => $breakOut,
                    'breakTime' => $breakTime,
                ];
                Time::create($form);
                //dd($item);
            } else {
                if ($date == $item['date']) {
                    $form = [
                        'breakIn' => "",
                        'breakOut' => $breakOut,
                        'breakTime' => $breakTime,
                    ];
                    Time::find($item['id'])->update(($form));
                } else {
                    $form = [
                        'user_id' => $user['id'],
                        'date' => $date,
                        'name' => $user['name'],
                        'breakIn' => "",
                        'breakOut' => $breakOut,
                        'breakTime' => $breakTime,
                    ];
                    Time::create($form);
                }
            }

        }

        return redirect('attendance');
    }

    public function test()
    {
        return view('test');
    }

    public function userList()
    {

        $users = User::paginate(5);

        return view('user',['users'=>$users]);
        
    }

    public function user_attendance(Request $request)
    {

        $user_id = $request->id;

        $user_name = $request->name;

        $users = Time::where('user_id', $user_id)->paginate(5);

        $users->appends($user_id);

        return view('user_attendance',['times'=>$users],['user_name'=>$user_name]);
    }

    public function yesterday(Request $request) {
        $items=$request->date;
        $date=new Carbon($items);
        //$item = $items->format('Y-m-d');
        $date->subDay(1);
        $times = Time::whereDate('created_at', $date)->paginate(5);

        return view('attendance', ['times' => $times], ['date' => $date]);
    }

    public function tomorrow(Request $request) {
        $items = $request->date;
        $date = new Carbon($items);
        //$item = $items->format('Y-m-d');
        $date->addDay(1);
        $times = Time::whereDate('created_at', $date)->paginate(5);

        return view('attendance', ['times' => $times], ['date' => $date]);
    }

    public function attendance()
    {
        $items = Carbon::now();
        $date = $items->format('Y-m-d');
        $times = Time::whereDate('created_at', $date)->paginate(5);

        return view('attendance', ['times' => $times], ['date' => $date]);
    }
}
