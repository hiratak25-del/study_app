<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>学習記録アプリ</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <h1 class="text-gray-500 font-bold text-3xl text-center my-5">学習記録を編集</h1>

    <form action="{{ route('study-records.update', $studyRecord) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="w-1/2 mx-auto w flex gap-5 justify-center mb-5">
            <label class="w-1/4 bg-blue-300 py-2 px-4 rounded-lg text-center">学習日</label>
            <input class="w-3/4 border pl-2" type="date" name="study_date"
                value="{{ old('study_date', $studyRecord->study_date) }}">
            @error('study_date')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="w-1/2 mx-auto flex gap-5 justify-center mb-5">
            <label class="w-1/4 bg-blue-300 py-2 px-4 rounded-lg text-center">カテゴリ</label>
            <select input class="w-3/4 border pl-2" name="category" id="category">
                <option value="HTML" @selected($studyRecord->category === 'HTML')>
                    HTML
                </option>

                <option value="CSS" @selected($studyRecord->category === 'CSS')>
                    CSS
                </option>

                <option value="JavaScript" @selected($studyRecord->category === 'JavaScript')>
                    JavaScript
                </option>

                <option value="PHP" @selected($studyRecord->category === 'PHP')>
                    PHP
                </option>

                <option value="Laravel" @selected($studyRecord->category === 'Laravel')>
                    Laravel
                </option>
                <option value="Laravel" @selected($studyRecord->category === 'Other')>
                    Other
                </option>
            </select>
            @error('category')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="w-1/2 mx-auto flex gap-5 justify-center mb-5">
            <label class="w-1/4 bg-blue-300 py-2 px-4 rounded-lg text-center">学習時間</label>
            <input class="w-3/4 border pl-2" type="number" name="minutes"
                value="{{ old('minutes', $studyRecord->minutes) }}">
            @error('minutes')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mx-auto w-1/2 flex flex-col gap-5 justify-center mb-5">
            <label class="w-1/4 bg-blue-300 py-2 px-4 rounded-lg text-center">メモ</label>
            <textarea class="border h-40 px-2 py-1" name="memo">{{ old('memo', $studyRecord->memo) }}</textarea>
        </div>

        <button class="bg-green-400 py-2 px-4 rounded-lg text-center mx-auto justify-center block text-white"
            type="submit">更新する</button>

    </form>

    @yield('content')

</body>

</html>