<!DOCTYPE html>
<html class="login-page" lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="robots" content="none">
  <meta name="googlebot" content="noindex, nofollow">
  <meta name="yandex" content="none">
  <title>Вход | Lady Healthcare</title>
  <style>
    .login-page-body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
  </style>
</head>

<body class="login-page-body">

  <form class="login-form" action="{{ route('auth.check') }}" method="post">
    @csrf
    {!! session()->has('fail') ? '<p>' . session()->get('fail') . '</p>' : '' !!}
    <input name="login" type="text" placeholder="Логин" required>
    <input id="password" name="password" type="password" placeholder="Пароль" autocomplete="off" required>
    <button type="submit">Войти</button>
  </form>

</body>

</html>
