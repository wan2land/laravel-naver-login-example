<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
    </head>
    <body>
        @if (Auth::user())
            <h2>로그인 중..</h2>
            <a href="/auth/logout">로그아웃</a>
            <h2>로그인정보</h2>
            <pre>{{ Auth::user() }}</pre>
        @else
            <h2>로그인이 필요합니다.</h2>
            <a href="/auth/naver">네이버로 로그인하기</a>
        @endif
    </body>
</html>
