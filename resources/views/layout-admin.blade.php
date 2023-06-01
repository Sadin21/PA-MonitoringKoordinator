<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>@yield('title')</title>
</head>
<body class="bg-[#F4F4F4]">
    <section>
      @include('pages.admin.navbar')
    </section>
    <section class="px-44 py-10">
        @yield('content')
    </section>
  </body>
</html>