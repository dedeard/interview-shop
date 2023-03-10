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

<body class="layout-navbar-fixed layout-fixed">
  <div class="wrapper" id="app">
    <x-admin.layout.navbar />
    <x-admin.layout.sidebar />

    <div class="content-wrapper">
      <div class="content py-3">
        <div class="container-fluid">
          {{ $slot }}
        </div>
      </div>
    </div>

    <!-- Main Footer -->
    <x-admin.layout.footer />
  </div>

  @vite(['resources/js/app.js'])
  {{ $script }}
  <x-alert />
</body>

</html>
