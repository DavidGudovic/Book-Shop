<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="author" content="David Gudović">
  <meta name="description" content="Online prodavnica knjizare Aurora">
  <title>Knjižara Aurora</title>
  <link rel="icon" href="{{URL('icon.svg')}}">
  @vite('resources/js/app.js')
</head>

<body class="flex flex-col antialiased bg-gray-100 min-h-screen">

    <!--HEADER OPTIONAL-->
    @yield('header')
    <!--END HEADER-->
    @include('includes.navbar')

<div class="flex  flex-row justify-center items-center flex-1">
  <!-- SIDEBAR OPTIONAL-->
  <aside>
    @yield('sidebar')
  </aside>
  <!-- END SIDEBAR -->
  <!-- CONTENT -->
  <main class="">
    @yield('content')
  </main>
  <!-- END CONTENT -->
</div>

  @include('includes.footer')
</body>
</html>
