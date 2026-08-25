<?php

namespace App\Http\Controllers;

use App\Models\StudyRecord;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $studyRecords = StudyRecord::where(
            'user_id',
            auth()->id()
        )
            ->latest('study_date')
            ->get();

        $recentStudyRecords = StudyRecord::where('user_id', auth()->id())
            ->latest('study_date')
            ->take(5)
            ->get();

        $monthlyMinutes = StudyRecord::where(
            'user_id',
            auth()->id()
        )
            ->whereMonth('study_date', now()->month)
            ->whereYear('study_date', now()->year)
            ->sum('minutes');

        $hours = intdiv($monthlyMinutes, 60);
        $minutes = $monthlyMinutes % 60;

        $dates = StudyRecord::where(
            'user_id',
            auth()->id()
        )
            ->pluck('study_date')
            ->map(function ($date) {
                return \Carbon\Carbon::parse($date)->format('Y-m-d');
            })
            ->unique()
            ->sort()
            ->values();

        $streak = 0;

        $today = \Carbon\Carbon::today();

        foreach ($dates->sortDesc() as $date) {

            $date = \Carbon\Carbon::parse($date);

            $expectedDate = $today->copy()->subDays($streak);

            if ($date->isSameDay($expectedDate)) {
                $streak++;
            } else {
                break;
            }
        }

        $achievementMessage = null;

        if ($streak >= 30) {
            $achievementMessage = '🏆 30日連続達成！素晴らしいです！';
        } elseif ($streak >= 7) {
            $achievementMessage = '🔥 7日連続達成！1週間続きました！';
        } elseif ($streak >= 3) {
            $achievementMessage = '🎉 3日連続達成！この調子です！';
        }

        $weeklyGoal = 5;

        $weeklyRecords = StudyRecord::where(
            'user_id',
            auth()->id()
        )
            ->whereBetween('study_date', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])
            ->get();
        $weeklyDates = $weeklyRecords
            ->pluck('study_date')
            ->map(function ($date) {
                return \Carbon\Carbon::parse($date)->format('Y-m-d');
            })
            ->unique();

        $weeklyStudyDays = $weeklyDates->count();

        $weeklyRate = min(
            100,
            round(($weeklyStudyDays / $weeklyGoal) * 100)
        );


        return view('dashboard', compact(
            'studyRecords',
            'monthlyMinutes',
            'hours',
            'minutes',
            'streak',
            'achievementMessage',
            'weeklyGoal',
            'weeklyStudyDays',
            'weeklyRate',
            'recentStudyRecords'
        ));
    }
}
