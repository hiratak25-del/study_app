<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>学習記録アプリ</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <h1 class="text-blue-500 text-center font-bold text-3xl mt-5 mb-6">学習記録一覧</h1>

    <div class="flex gap-5 w-1/2 mx-auto justify-center mb-8">
        <a class="bg-blue-300 p-4 rounded-lg" href="{{ route('study-records.create') }}">
            学習記録を追加
        </a>

        <a class="bg-green-300 p-4 rounded-lg" href="{{ route('dashboard') }}">
            ダッシュボードへ戻る
        </a>
    </div>



    <div class="w-5/6 mx-auto flex gap-8 justify-center">
        <table class="w- full border border-collapse text-center">
            <tr class="border">
                <th class="border py-2">学習日</th>
                <th class="border py-2">カテゴリ</th>
                <th class="border py-2">学習時間</th>
                <th class="border py-2">メモ</th>
                <th class="border py-2">編集・削除</th>
            </tr>
            @foreach ($studyRecords as $studyRecord)
                <tr class="border">
                    <td class="border px-4 py-2">{{ $studyRecord->study_date }}</td>
                    <td class="border px-4 py-2">{{ $studyRecord->category }}</td>
                    <td class="border px-4 py-2">{{ $studyRecord->minutes }}</td>
                    <td class="border px-4 py-2">{{ $studyRecord->memo }}</td>
                    <td class=" p-4 border">
                        <div class="flex flex-col gap-3 items-center">
                            <a class="w-20 mx-auto bg-blue-300 py-1 px-4 rounded-lg block"
                                href="{{ route('study-records.edit', $studyRecord) }}">
                                編集
                            </a>
                            <form action="{{ route('study-records.destroy', $studyRecord) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="cursor-pointer w-20 bg-red-300 py-1 px-4 rounded-lg" type="submit">
                                    削除
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>


    @yield('content')

</body>

</html>
<!-- <div>
                                    <p>学習日：{{ $studyRecord->study_date }}</p>
                                    <p>カテゴリ：{{ $studyRecord->category }}</p>
                                    <p>学習時間：{{ $studyRecord->minutes }}分</p>
                                    <p>メモ：{{ $studyRecord->memo }}</p>
                                </div> -->
<!-- <div class="flex-col">
                            <a href="{{ route('study-records.edit', $studyRecord) }}">
                                編集
                            </a>

                            <form action="{{ route('study-records.destroy', $studyRecord) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit">
                                    削除
                                </button>
                            </form> -->