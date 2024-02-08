<!DOCTYPE html>
<html lang="ru">

<head class="page">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="robots" content="noindex">
  <meta name="googlebot" content="noindex">

  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <link rel="icon" href="{{ asset('favicon.ico') }}">
  <link rel="icon" href="{{ asset('favicons/icon.svg') }}" type="image/svg+xml">
  <link rel="apple-touch-icon" href="{{ asset('favicons/160x180.png') }}">
  <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">
  {!! htmlScriptTagJsApi() !!}
</head>

<body class="page-body {{ str_replace('.', '', $route) }}">
  <svg viewBox="0 0 4520 5096" width="1725" height="1937" fill="none">
    <path fill-rule="evenodd" clip-rule="evenodd" d="m2462.69 55.844 926.81 535.163 926.87 535.083c129.08 74.52 202.91 202.55 202.91 351.5v2140.44c0 148.99-73.83 277.01-202.91 351.47l-926.87 535.12-926.81 535.16-6.08 3.42-6.08 3.35-6.11 3.21-6.11 3.09h-.05l-6.14 3.02-6.19 2.88-6.19 2.8-6.24 2.66-6.25 2.57-6.27 2.43-6.29 2.35-6.3 2.26-6.33 2.09-6.35 2.04-6.34 1.9h-.03l-6.33 1.81h-.05l-6.37 1.69-6.36 1.59h-.05l-6.37 1.47h-.05l-6.36 1.37h-.04l-6.41 1.25h-.03l-6.42 1.14h-.03l-6.41 1.04h-.03l-6.42.91h-.05l-6.44.81-6.45.71h-.03l-6.45.62h-.03l-6.44.48h-.05l-6.45.37h-.03l-6.45.29h-.03l-6.44.16h-.05l-6.45.06h-.03l-6.45-.06h-.05l-6.44-.16h-.03l-6.45-.29h-.03l-6.45-.37h-.05l-6.44-.48h-.03l-6.45-.62h-.03l-6.45-.71-6.45-.81h-.04l-6.42-.91h-.03l-6.41-1.04h-.04l-6.41-1.14h-.03l-6.42-1.25h-.03l-6.38-1.37h-.03l-6.37-1.47h-.05l-6.36-1.59-6.37-1.69h-.05l-6.33-1.81h-.03l-6.34-1.9-6.35-2.04-6.33-2.09-6.3-2.26-6.29-2.35-6.27-2.43-6.27-2.57-6.22-2.66-6.19-2.8-6.19-2.88-6.15-3.02h-.04l-6.11-3.09-6.11-3.21-6.08-3.35-6.08-3.42-926.81-535.16-926.865-535.12C74.061 3895.04.225 3767.02.225 3618.03V1477.59c0-148.95 73.837-276.98 202.92-351.5l926.865-535.083 926.81-535.163c129.05-74.459 276.82-74.459 405.87 0ZM1800.4 4081.23l319.46 184.46 4.16 2.37h.03l4.16 2.32c41.35 21.55 80.79 32.65 127.07 33.78 48.7.82 92.8-11.23 136.02-33.78l4.16-2.32h.03l4.16-2.37 319.46-184.46 319.45-184.46 638.97-368.86c88.97-51.36 139.89-139.59 139.89-242.3V1810.04c0-102.75-50.92-190.94-139.89-242.3l-638.97-368.89-638.91-368.886-4.16-2.367h-.03l-4.16-2.32c-42.77-22.33-85.88-34.23-136.02-33.814-40.15.992-77.66 9.981-114.36 27.4l-4.23 2.064-4.24 2.143-4.24 2.207-4.16 2.32h-.03l-4.16 2.367-638.91 368.886-638.975 368.89c-88.967 51.36-139.881 139.55-139.881 242.3v1475.57c0 102.71 50.914 190.94 139.881 242.3l638.975 368.86 319.45 184.46Z" fill="#ED3237" />
  </svg>
  @if ($admin)
    @include('layouts.dashboard')
  @endif

  @include('layouts.header')

  @yield('content')

  @include('layouts.footer')

  <script src="{{ asset('js/main.js') }}"></script>
  @yield('script')
  @if ($admin)
    <script src="{{ asset('js/dashboard.js') }}" type="module"></script>
  @endif
</body>

</html>
