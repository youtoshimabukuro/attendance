<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;

class AtteController extends Controller
{
    public function stamp()
    {
        $time = Carbon::now();
        $format = $time->format('H:i');
        $dates = [
            'time' => $format,
        ];

        return view('stamp', ['dates' => $dates]);
    }

    public function timeIn(Request $request)
    {
        $times = Carbon::now();
        $time = $times->format('H:i');
        $date = $times->format('Y-m-d');
        $item = Time::where('user_id', $request->user_id)->where('date', $date)->first();
        //dd($item);
        if ($item==null){
            $form = [
                'user_id' => $request->user_id,
                'date' => $date,
                'name' => $request->name,
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
                    'user_id' => $request->user_id,
                    'date' => $date,
                    'name' => $request->name,
                    'attendance' => $time,
                ];
                Time::create($form);
                //dd($item);
            }
        }
        
        return view('test');
    }

    public function timeOut(Request $request)
    {
        $times = Carbon::now();
        $time = $times->format('H:i');
        $date = $times->format('Y-m-d');
        $item = Time::where('user_id', $request->user_id)->where('date', $date)->first();
        $attendance = Carbon::parse($item['date']."".$item['attendance']);
        $work = $times->diffInMinutes($attendance);
        $actual_workTime = $work-$item['breakTime'];
        $timeMinutes = floor($actual_workTime / 60);
        $timeSeconds = floor($actual_workTime % 60);
        $workTimes = Carbon::parse($timeMinutes.":". $timeSeconds);
        $workTime=$workTimes->format("H:i");
        if ($item == null) {
            $form = [
                'user_id' => $request->user_id,
                'date' => $date,
                'name' => $request->name,
                'leaving' => $time,
                'workTime'=>$workTime,
            ];
            //Time::create($form);
            dd($item);
        } else {
            if ($date == $item['date']) {
                $form = [
                    'leaving' => $time,
                    'workTime'=> $workTime,
                ];
                Time::find($item['id'])->update(($form));
            } else {
                $form = [
                    'user_id' => $request->user_id,
                    'date' => $date,
                    'name' => $request->name,
                    'leaving' => $time,
                    'workTime' => $workTime,
                ];
                Time::create($form);
            }
        }

        return view('test');
    }

    public function breakIn(Request $request){
        $times = Carbon::now();
        $time = $times->format('H:i');
        $date = $times->format('Y-m-d');
        $item = Time::where('user_id', $request->user_id)->where('date', $date)->first();
        //dd($item);
        if ($item == null) {
            $form = [
                'user_id' => $request->user_id,
                'date' => $date,
                'name' => $request->name,
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
                    'user_id' => $request->user_id,
                    'date' => $date,
                    'name' => $request->name,
                    'breakIn' => $time,
                ];
                Time::create($form);
                //dd($item);
            }
        }

        return view('test');
    }

    public function breakOut(Request $request){
        $times = Carbon::now();
        $time = $times->format('H:i');
        $date = $times->format('Y-m-d');
        $item = Time::where('user_id', $request->user_id)->where('date', $date)->first();
        $breakIn = Carbon::parse($item['date']."".$item['breakIn']);
        $breakTimes = $times->diffInMinutes($breakIn);
        $breakTime = $item['breakTime'] + $breakTimes-1;
        $breakMinutes = floor($breakTimes / 60);
        $breakSeconds = floor($breakTimes % 60);
        $breakOuts = Carbon::parse($breakMinutes.":".$breakSeconds);
        $breakOut=$breakOuts->format("H:i");
        if ($item['breakIn']!='00:00:00'){
        if ($item == null) {
            $form = [
                'user_id' => $request->user_id,
                'date' => $date,
                'name' => $request->name,
                'breakIn'=>"",
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
                    'user_id' => $request->user_id,
                    'date' => $date,
                    'name' => $request->name,
                    'breakIn' => "",
                    'breakOut'=>$breakOut,
                    'breakTime' => $breakTime,
                ];
                Time::create($form);
                //dd($item);
            }
        }

    }

        return view('test');
    }

    public function test()
    {
        return view('test');
    }

    public function attendance()
    {
        $times = Time::paginate(5);

        return view('attendance', ['times' => $times]);
    }
}
