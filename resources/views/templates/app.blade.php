<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="author" content="David Gudović">
  <meta name="description" content="Online prodavnica knjizare Aurora">
  <title>Knjižara Aurora</title>
  @vite('resources/js/app.js')
</head>

<body class="flex flex-col antialiased bg-gray-100 h-screen">

    <!--HEADER-->
    @yield('header')
    <!--END HEADER-->
    @include('includes.navbar')

    <!-- SIDEBAR -->
    <aside>
      @yield('sidebar')
    </aside>
    <!-- END SIDEBAR -->
    <!-- CONTENT -->
    <main>
      @yield('content')
    </main>
    <!-- END CONTENT -->
  @include('includes.footer')
</body>
</html>
