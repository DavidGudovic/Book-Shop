@extends('templates.app')

@section('content')
  <!-- Login -->
  <div class="flex items-center justify-center mt-20">
    <div class="w-4/12 bg-white p-6 rounded-lg">

      <!--Status message display-->
      @if(session()->has('status'))
        <p class='text-center font-bold mb-5 @if(session('status') == 'error') text-red-600 @else text-green-400 @endif'>{{session('status_msg')}}</p>
      @endif
      <!-- End status message -->

      <!--Login form-->
      <form class="" action="{{route('login')}}" method="post">
        <!--fields-->
        <!-- Cross site request forgery -->
       @csrf

            <!--Username -->
          <div class="mb-4">
             <label for='username' class='sr-only'>Korisničko ime</label>
             <input type="text" name="username" id='username' placeholder="Unesite korisničko ime" class='bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror' value='{{old('email')}}'>
             @error('username')
               <div class="text-red-500 mt-2 text-sm">
                  {{$message}}
               </div>
             @enderror
          </div>
          <!-- Password -->
          <div class="mb-4">
             <label for= 'password' class='sr-only'>Lozinka</label>
             <input type= 'password' name= 'password' id= 'password' placeholder="Unesite lozinku" class='bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror' >
             @error('password')
               <div class="text-red-500 mt-2 text-sm">
                  {{$message}}
               </div>
             @enderror
          </div>
           <!-- remember me -->
          <div class="mb-4">
            <div class="flex items-center">
                <input type="checkbox" name="remember" class="mr-2" id='remember'>
                <label for='remember'>Zapamti me!</label>
            </div>
          </div>
          <!-- end fields-->
          <!-- Buttons -->
          <div>
             <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Ulogujte se!</button>
          </div>
          <!-- End buttons -->
      </form>
      <!-- End login form -->
    </div>
  </div>
  <!--End login -->
@endsection
