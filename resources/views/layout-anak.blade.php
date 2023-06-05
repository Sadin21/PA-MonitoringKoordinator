<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>@yield('title')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-[#F4F4F4]">
    <section class="sticky top-0">
      @include('pages.anak.navbar')
    </section>
    <section class="px-44 py-10">
        @yield('content')
    </section>

    <script>

      const toggleButton = document.getElementById('about');
      const toggleMenu = document.getElementById('about-menu');

      toggleButton.addEventListener('click', function() {
        if (toggleMenu.style.display === 'none') {
          toggleMenu.style.display = 'block';
        } else {
          toggleMenu.style.display = 'none';
        }
      })

    </script>
  </body>
</html>