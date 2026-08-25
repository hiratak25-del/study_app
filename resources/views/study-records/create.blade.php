@extends('layouts.app')

@section('content')

    <h1 class="text-gray-500 font-bold text-3xl text-center my-5">学習記録登録</h1>

    <form action="{{ route('study-records.store') }}" method="POST">

        @csrf

        <div class="w-1/2 mx-auto w flex gap-5 justify-center mb-5">
            <label class="w-1/4 bg-blue-300 py-2 px-4 rounded-lg text-center">学習日</label>
            <input class="w-3/4 border pl-2" type="date" name="study_date" value="{{ old('study_date') }}">
            @error('study_date')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="w-1/2 mx-auto flex gap-5 justify-center mb-5">
            <label class="w-1/4 bg-blue-300 py-2 px-4 rounded-lg text-center">カテゴリ</label>
            <select class="w-3/4 border pl-2"  name="category" id="category">
                <option value="">選択してください</option>
                <option value="HTML">HTML</option>
                <option value="CSS">CSS</option>
                <option value="JavaScript">JavaScript</option>
                <option value="PHP">PHP</option>
                <option value="Laravel">Laravel</option>
                <option value="PHP">Other</option>
            </select>
            @error('category')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mx-auto w-1/2 flex gap-5 justify-center mb-5">
            <label class="w-1/4 bg-blue-300 py-2 px-4 rounded-lg text-center">学習時間（分）</label>
            <input class="w-3/4 border pl-2" type="number" name="minutes" value="{{ old('minutes') }}">
            @error('minutes')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mx-auto w-1/2 flex flex-col gap-5 justify-center mb-5">
            <label class="w-1/4 bg-blue-300 py-2 px-4 rounded-lg text-center">メモ</label>
            <textarea class="border h-40 py-1 px-2" name="memo">{{ old('memo') }}</textarea>
        </div>

        <button class="bg-green-400 text-white py-2 px-4 rounded-lg text-center mx-auto justify-center block cursor-pointer"
            type="submit">登録する</button>

    </form>

@endsection