<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>学習記録アプリ</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="max-full bg-white mb-10">
        <h1 class="text-center text-gray-600 text-xl mt-4">学習記録ダッシュボード</h1>

        <div class="rounded-xl p-6 shadow">
            <h2 class="text-sm font-medium text-gray-500 text-center">
                今月の学習時間
            </h2>

            <p class="mt-2 text-3xl font-bold text-black text-center">
                {{ $hours }}時間{{ $minutes }}分
            </p>
        </div>
    </div>

    <div class="w-1/2 mx-auto mb-12">
        <h2 class="text-blue-500 text-xl font-bold mb-1">連続学習日数</h2>

        <p class="mb-1">
            {{ $streak }}日
        </p>

        @if ($achievementMessage)
            <p class="bg-blue-200 mb-5 inline-block">
                {{ $achievementMessage }}
            </p>
        @endif

        <h2 class="text-blue-500 text-xl font-bold mt-4 mb-1">今週の目標</h2>

        <p>
            {{ $weeklyGoal }}日
        </p>

        <p class="text-blue-500 text-xl font-bold mt-4 mb-1">
            今週の学習日数
        <p>
            {{ $weeklyStudyDays }}日
        </p>
        </p>

        <p class="text-blue-500 text-xl font-bold mt-4 mb-1">
            今週の目標達成率
        <p>
            {{ $weeklyRate }}%
        </p>
        </p>

        <h2 class="text-blue-500 text-xl font-bold mt-4 mb-1">最近の学習記録</h2>

        @foreach ($studyRecords as $studyRecord)
            <div>
                <p class="pb-2">
                    {{ $studyRecord->study_date }}
                    {{ $studyRecord->category }}
                    {{ $studyRecord->minutes }}分
                </p>
            </div>
        @endforeach
    </div>

    <div class="flex gap-5 justify-center w-1/2 mx-auto">
        <a class="w-48 bg-blue-400 py-4 px-4 rounded-full text-xl text-white text-center block mb-10"
            href="{{ route('study-records.index') }}">
            学習記録一覧へ
        </a>

        <a class="w-48 bg-green-400 py-4 px-4 rounded-full text-xl text-white text-center block mb-10"
            href="{{ route('calendar') }}">カレンダーを見る</a>
    </div>
    @yield('content')

</body>

</html>