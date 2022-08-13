@extends('templates.app')

@section('background-pattern') bg-aurora-phone md:bg-aurora-login bg-cover bg-no-repeat bg-center @endsection

@section('content')
  <!-- Login -->
  <div class="flex items-center justify-center my-20 ">

    <div class="flex flex-col gap-10 ">
      <h1 class="text-2xl font-bold text-center">Prijava korisnika</h1>
      <div class="w-4/12 min-w-[400px]  p-6  rounded-lg border-2 border-black bg-gray-200 ">

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
              <input type="text" name="username" id='username' placeholder="Unesite korisničko ime"
              class='form-control @error('username') border-red-500 @enderror' value='{{old('email')}}'>
                @error('username')
                  <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                  </div>
                @enderror
              </div>
              <!-- Password -->
              <div class="mb-4">
                <label for= 'password' class='sr-only'>Lozinka</label>
                <input type= 'password' name= 'password' id= 'password' placeholder="Unesite lozinku"
                class='form-control @error('password') border-red-500 @enderror' >
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
                    <label for='remember'>Zapamti me</label>
                  </div>
                </div>
                <!-- end fields-->
                <!-- Buttons -->
                <div>
                  <button type="submit" class="form-btn">Prijavi se</button>
                </div>
                <!-- End buttons -->
              </form>
              <!-- End login form -->
            </div>
          </div>

        </div>
        <!--End login -->
      @endsection
