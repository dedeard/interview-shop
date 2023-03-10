@props([
    'head' => '',
    'script' => '',
    'title' => config('app.name', 'Laravel'),
    'description' => config('app.description', 'The Laravel Framework.'),
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title }}</title>
  <meta name="description" content="{{ $description }}" />

  @vite(['resources/sass/app.scss'])
  {!! $head !!}
</head>

<body class="min-vh-100 d-flex flex-column bg-light">
  <x-layout.header />
  <main class="w-100">
    {{ $slot }}
  </main>
  <x-layout.footer />

  @vite(['resources/js/app.js'])
  {{ $script }}
  <x-alert />
</body>

</html>
