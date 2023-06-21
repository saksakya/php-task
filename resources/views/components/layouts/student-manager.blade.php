<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/style.css" >
    <title>{{ $title }}</title>
</head>
<body>
    <header>
        生徒管理システム
        <hr>
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>
        <hr>
        @Laravel
    </footer>
</body>
</html>
