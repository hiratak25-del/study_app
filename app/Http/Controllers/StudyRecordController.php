<?php

namespace App\Http\Controllers;

use App\Models\StudyRecord;
use Illuminate\Http\Request;

class StudyRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studyRecords = StudyRecord::where('user_id', auth()->id())->get();

        return view('study-records.index', compact('studyRecords'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('study-records.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'study_date'=> ['required','date'],
            'category'=>['required'],
            'minutes'=>['required','integer','min:1'],
            'memo'=>['nullable'],
        ],[

        'study_date.required' => '学習日は必ず入力してください。',
        'study_date.date' => '学習日には正しい日付を入力してください。',

        'category.required' => 'カテゴリは必ず入力してください。',

        'minutes.required' => '学習時間は必ず入力してください。',
        'minutes.integer' => '学習時間は整数で入力してください。',
        'minutes.min' => '学習時間は1分以上で入力してください。',
        ]);
        $studyRecord = StudyRecord::create([
            'user_id' => auth()->id(),
            'study_date' => $request->study_date,
            'category' => $request->category,
            'minutes' => $request->minutes,
            'memo' => $request->memo,
        ]);
        return redirect()->route('study-records.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudyRecord $studyRecord)
    {
        if ($studyRecord->user_id !== auth()->id()) {
        abort(403);
    }

    return view('study-records.edit', compact('studyRecord'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudyRecord $studyRecord)
    {

     $validated = $request->validate([
        'study_date' => ['required', 'date'],
        'category' => ['required'],
        'minutes' => ['required', 'integer', 'min:1'],
        'memo' => ['nullable'],
    ],
    [

        'study_date.required' => '学習日は必ず入力してください。',
        'study_date.date' => '学習日には正しい日付を入力してください。',

        'category.required' => 'カテゴリは必ず入力してください。',

        'minutes.required' => '学習時間は必ず入力してください。',
        'minutes.integer' => '学習時間は整数で入力してください。',
        'minutes.min' => '学習時間は1分以上で入力してください。',
    ]);
        if($studyRecord->user_id !== auth()->id()){
            abort(403);
    }
        $studyRecord->update([
            'study_date' => $request->study_date,
            'category' => $request->category,
            'minutes' => $request->minutes,
            'memo' => $request->memo,
        ]);

        return redirect()->route('study-records.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudyRecord $studyRecord)
    {

     if($studyRecord->user_id !== auth()->id()){
            abort(403);
    }

        $studyRecord->delete();

        return redirect()->route('study-records.index');
    }
}
