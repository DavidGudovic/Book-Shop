<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="author" content="David Gudović">
  <meta name="description" content="Online prodavnica knjizare Aurora">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token()}}">

  <title>Knjižara Aurora</title>
  <link rel="icon" href="{{URL('icon.svg')}}">
  @vite('resources/js/app.js')
  @livewireStyles
</head>
   <body class="flex flex-col antialiased bg-gray-200 min-h-screen">
     <!--HEADER OPTIONAL-->
     @yield('header')
     <!--END HEADER-->
     <!--NAVBAR-->
     @include('includes.navbar')
     <!--END NAVBAR -->

     <!-- CONTENT - Injectable background-->
     <div class="flex flex-row flex-1 justify-center @yield('background-pattern')">
       <!-- MAIN CONTENT -->
       <main class="w-screen">
         @yield('content')
       </main>
       <!-- END MAIN CONTENT -->
       <!--OPTIONAL ASIDE-->
       <aside>
         @yield('side')
       </aside>
       <!-- END ASIDE -->
     </div>
     <!-- END CONTENT -->

     <!--FOOTER-->
     @include('includes.footer')
     <!--END FOOTER-->
     @livewireScripts
     <!-- Global modals -->
     @auth
     <livewire:cart-modal />
     @endauth
     <!-- End global modals-->
   </body>
</html>
