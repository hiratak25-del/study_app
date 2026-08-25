<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>学習カレンダー</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="max-w-6xl mx-auto px-4 py-8">

        <h1 class="text-3xl font-bold text-center mb-8">
            {{ $startOfMonth->format('Y年n月') }}
        </h1>

        <div class="grid grid-cols-7 border-l border-t">

            <div class="border-r border-b p-3 text-center font-bold">
                日
            </div>

            <div class="border-r border-b p-3 text-center font-bold">
                月
            </div>

            <div class="border-r border-b p-3 text-center font-bold">
                火
            </div>

            <div class="border-r border-b p-3 text-center font-bold">
                水
            </div>

            <div class="border-r border-b p-3 text-center font-bold">
                木
            </div>

            <div class="border-r border-b p-3 text-center font-bold">
                金
            </div>

            <div class="border-r border-b p-3 text-center font-bold">
                土
            </div>

        </div>
        <div class="grid grid-cols-7 border-l">
            @for ($i = 0; $i < $startOfMonth->dayOfWeek; $i++)
                <div class="min-h-32 border-r border-b bg-gray-50"></div>
            @endfor

            @foreach ($dates as $date)

                @php
                    $dailyRecords = $studyRecords->filter(function ($studyRecord) use ($date) {
                        return $studyRecord->study_date == $date->format('Y-m-d');
                    });
                    $categories = $dailyRecords->groupBy('category');
                @endphp

                <div class="min-h-32 border-r border-b p-2
                            @if ($dailyRecords->count() > 0)
                                bg-blue-50
                            @else
                                bg-white
                            @endif
                        ">

                    <div class="min-h-auto p-2">
                        {{ $date->day }}
                    </div>

                    @foreach ($categories as $category => $records)

                        <p class="text-sm mb-1">
                            <span class="font-semibold"> {{ $category }}</span>
                            {{ $records->sum('minutes') }}分
                        </p>
                    @endforeach
                    @if ($dailyRecords->count() > 0)
                        <p class="mt-3 pt-2 border-t font-bold text-sm">
                            合計：{{ $dailyRecords->sum('minutes') }}分
                        </p>
                    @endif

                </div>
            @endforeach
        </div>
    </div>

    <a class="w-1/4 bg-blue-400 py-4 px-2 rounded-full text-white text-center block mb-10 justify-center mx-auto" href="{{ route('study-records.index') }}">学習記録一覧に戻る</a>
</body>

</html>