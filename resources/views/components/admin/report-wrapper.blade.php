@props(['title'])

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>{{ $title }}</title>
  <style>
    html,
    body {
      padding: 0;
    }

    body {
      padding: 10px 15px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    tr:hover {
      background-color: #f5f5f5;
    }
  </style>
</head>

<body>
  <h1>{{ $title }}</h1>
  {{ $slot }}
</body>

</html>
