
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>学習記録アプリ</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
<h1 class="text-center text-gray-600 text-xl mt-4">学習記録ダッシュボード</h1>

<div class="rounded-xl bg-white p-6 shadow">
    <h2 class="text-sm font-medium text-gray-500 text-center">
        今月の学習時間
    </h2>

 <p class="mt-2 text-3xl font-bold text-gray-900 text-center">
        {{ $hours }}時間{{ $minutes }}分
    </p>
</div>

<h2>連続学習日数</h2>

<p>
    {{ $streak }}日
</p>

@if ($achievementMessage)
    <p>
        {{ $achievementMessage }}
    </p>
@endif

<h2 class="text-blue-500">今週の目標</h2>

<p>
    {{ $weeklyGoal }}日
</p>

<p>
    今週の学習日数：{{ $weeklyStudyDays }}日
</p>

<p>
    達成率：{{ $weeklyRate }}%
</p>

<h2>最近の学習記録</h2>

@foreach ($studyRecords as $studyRecord)
    <div>
        <p>
            {{ $studyRecord->study_date }}
            {{ $studyRecord->category }}
            {{ $studyRecord->minutes }}分
        </p>
    </div>
@endforeach

<a class="bg-blue-400 py-2 px-4 rounded text-xs text-black text-center block" href="{{ route('study-records.index') }}">
    学習記録一覧へ
</a>

 @yield('content')

</body>
</html>