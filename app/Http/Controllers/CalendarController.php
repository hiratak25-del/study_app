<?php

namespace App\Http\Controllers;
use App\Models\StudyRecord;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function index()
    {

        $studyRecords = StudyRecord::where(
            'user_id',
            auth()->id()
        )->get();

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

         $dates = [];

        $date = $startOfMonth->copy();

        while ($date <= $endOfMonth) {
            $dates[] = $date->copy();

            $date->addDay();
        }

        return view('calendar', compact(
            'studyRecords',
            'startOfMonth',
            'endOfMonth',
            'dates'
        ));

    }
}
