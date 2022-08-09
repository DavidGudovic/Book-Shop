<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="author" content="David Gudović">
  <meta name="description" content="Online prodavnica knjizare Aurora">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Knjižara Aurora</title>
  <link rel="icon" href="{{URL('icon.svg')}}">
  @vite('resources/js/app.js')
</head>
   <body class="flex flex-col antialiased bg-gray-200 min-h-screen">
     <!--HEADER OPTIONAL-->
     @yield('header')
     <!--END HEADER-->
     <!--NAVBAR-->
     @include('includes.navbar')
     <!--END NAVBAR -->

     <!-- CONTENT -->
     <div class="flex flex-row flex-1 justify-center items-center ">
       <!-- SIDEBAR OPTIONAL-->
       <aside>
         @yield('sidebar')
       </aside>
       <!-- END SIDEBAR -->
       <!-- MAIN CONTENT -->
       <main>
         @yield('content')
       </main>
       <!-- END MAIN CONTENT -->
     </div>
     <!-- END CONTENT -->

     <!--FOOTER-->
     @include('includes.footer')
     <!--END FOOTER-->
   </body>
</html>
