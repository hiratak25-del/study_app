<h1>学習記録登録</h1>

<form action="{{ route('study-records.store') }}" method="POST">

    @csrf

    <div>
        <label>学習日</label>
        <input type="date" name="study_date" value="{{ old('study_date') }}">
        @error('study_date')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>カテゴリ</label>
        <input type="text" name="category" value="{{ old('category') }}">
        @error('category')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>学習時間（分）</label>
        <input type="number" name="minutes" value="{{ old('minutes') }}">
        @error('minutes')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>メモ</label>
        <textarea name="memo">{{ old('memo') }}</textarea>
    </div>

    <button type="submit">登録する</button>

</form>