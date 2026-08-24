<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>学習カレンダー</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

   <h1>今月の日付</h1>

   <div class="grid grid-cols-7">
    <div>日</div>
    <div>月</div>
    <div>火</div>
    <div>水</div>
    <div>木</div>
    <div>金</div>
    <div>土</div>

@for ($i = 0; $i < $startOfMonth->dayOfWeek; $i++)
    <div></div>
@endfor

@foreach ($dates as $date)
      <div>
            {{ $date->day }}
        </div>
@endforeach
</div>

</body>

</html>