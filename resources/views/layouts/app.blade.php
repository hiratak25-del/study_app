<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>学習記録アプリ</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <header class="bg-white shadow">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">

            {{-- アプリ名 --}}
            <a href="{{ route('dashboard') }}"
               class="text-xl font-bold text-blue-600">
                学習記録
            </a>

            {{-- ナビゲーション --}}
            <nav class="flex items-center gap-5">

                <a href="{{ route('dashboard') }}"
                   class="text-gray-700 hover:text-blue-600">
                    ダッシュボード
                </a>

                <a href="{{ route('study-records.index') }}"
                   class="text-gray-700 hover:text-blue-600">
                    一覧
                </a>

                <a href="{{ route('study-records.create') }}"
                   class="text-gray-700 hover:text-blue-600">
                    学習記録を登録
                </a>

                 <a href="{{ route('calendar') }}"
                   class="text-gray-700 hover:text-blue-600">
                    カレンダー
                </a>

            </nav>

            {{-- ログインユーザー --}}
            <div class="flex items-center gap-4">

                <span class="text-sm text-gray-600">
                    こんにちは、{{ auth()->user()->name }}さん
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                            class="rounded-lg bg-gray-200 px-4 py-2 text-sm hover:bg-gray-300 cursor-pointer">
                        ログアウト
                    </button>
                </form>

            </div>

        </div>
    </header>

    {{-- 各ページの内容 --}}
    <main class="mx-auto max-w-6xl px-6 py-8">

        @yield('content')

    </main>

</body>

</html>