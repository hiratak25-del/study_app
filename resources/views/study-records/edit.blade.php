<h1>学習記録を編集</h1>

<form action="{{ route('study-records.update', $studyRecord) }}" method="POST">

    @csrf
    @method('PUT')

    <div>
        <label>学習日</label>
        <input
            type="date"
            name="study_date"
            value="{{ old('study_date',$studyRecord->study_date) }}">
        @error('study_date')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>カテゴリ</label>
        <input
            type="text"
            name="category"
            value="{{ old('category',$studyRecord->category) }}">
        @error('category')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>学習時間</label>
        <input
            type="number"
            name="minutes"
            value="{{ old('minutes',$studyRecord->minutes) }}">
        @error('minutes')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>メモ</label>
        <textarea name="memo">{{ old('memo',$studyRecord->memo) }}</textarea>
    </div>

    <button type="submit">更新する</button>

</form>