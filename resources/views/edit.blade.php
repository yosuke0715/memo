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
                <form method="post" action="{{ url('/edit/add') }}" class="add_form">
                    @csrf
                    <textarea name="content" id="" cols="30" rows="10">{{ $content->content }}</textarea>
                    <input type="hidden" name="id" value="{{ $id }}">
                    <input class="submit" type="submit" value="変更する">
                </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>
