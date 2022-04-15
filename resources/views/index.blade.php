<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
    <main>
        <div class="memo_area">
            <div class="add_area">
                <div class="add_card">
                    <div class="add_title">メモを追加する</div>
                    <form method="post" action="{{ url('/add') }}" class="add_form">
                        @csrf
                        <textarea name="content" id="" cols="30" rows="10"></textarea>
                        <input class="submit" type="submit" value="追加する">
                    </form>
                </div>
            </div>
            <div class="show_area">
                @foreach($contents as $content)
                    <div class="memo_card">
                    <span class="memo_title">{{ $content->content }}</span>
                    <form method="post" class="edit" action="{{ url('/edit/'.$content->id) }}">
                        @csrf
                        <input type="submit" value="編集">
                    </form>
                    <form class="del" method="post" action="{{ url('/del') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $content->id }}">
                        <input type="submit" value="削除">
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</body>
</html>
