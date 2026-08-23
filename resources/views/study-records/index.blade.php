<h1>学習記録一覧</h1>

<a href="{{ route('study-records.create') }}">
    学習記録を追加
</a>

@foreach ($studyRecords as $studyRecord)

    <div>
        <p>学習日：{{ $studyRecord->study_date }}</p>
        <p>カテゴリ：{{ $studyRecord->category }}</p>
        <p>学習時間：{{ $studyRecord->minutes }}分</p>
        <p>メモ：{{ $studyRecord->memo }}</p>

        <a href="{{ route('study-records.edit', $studyRecord) }}">
            編集
        </a>

        <form action="{{ route('study-records.destroy', $studyRecord) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit">
                削除
            </button>
        </form>
    </div>

    <hr>


@endforeach

<a href="{{ route('dashboard') }}">
    ダッシュボードへ戻る
</a>