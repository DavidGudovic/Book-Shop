@extends('templates.app')

@section('content')
  <!-- Register -->
  <div class="flex justify-center mt-8">
    <div class="w-4/12 bg-white p-6 m-3 rounded-lg">

      <!--Status message display-->
      @if(session()->has('status'))
        <p class='text-center font-bold mb-5 @if(session('status') == 'error') text-red-600 @else text-green-400 @endif'>{{session('status_msg')}}</p>
      @endif
      <!-- End status message -->

        <!-- Register form -->
      <form class="" action="{{route('register')}}" method="post">

          <!-- Fields -->
          <!-- Cross site request forgery -->
       @csrf

            <!-- Username -->
          <div class="mb-4">
             <label for='username' class='sr-only'>Korisničko ime</label>
             <input type="text" name="username" id='username' placeholder="Unesite korisničko ime" class='bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror' value='{{old('username')}}'>
             @error('username')
               <div class="text-red-500 mt-2 text-sm">
                  {{$message}}
               </div>
             @enderror
          </div>
            <!-- Email -->
          <div class="mb-4">
             <label for='email' class='sr-only'>Email</label>
             <input type="text" name="email" id='email' placeholder="Unesite email" class='bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror' value='{{old('email')}}'>
             @error('email')
               <div class="text-red-500 mt-2 text-sm">
                  {{$message}}
               </div>
             @enderror
          </div>
            <!-- Name -->
          <div class="mb-4">
             <label for='name' class='sr-only'>Ime</label>
             <input type="text" name="name" id='name' placeholder="Unesite ime" class='bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror' value='{{old('name')}}'>
             @error('name')
               <div class="text-red-500 mt-2 text-sm">
                  {{$message}}
               </div>
             @enderror
          </div>
            <!-- Last name -->
          <div class="mb-4">
             <label for='lastname' class='sr-only'>Prezime</label>
             <input type="text" name="lastname" id='lastname' placeholder="Unesite prezime" class='bg-gray-100 border-2 w-full p-4 rounded-lg @error('lastname') border-red-500 @enderror' value='{{old('lastname')}}'>
             @error('lastname')
               <div class="text-red-500 mt-2 text-sm">
                  {{$message}}
               </div>
             @enderror
          </div>
            <!-- pass -->
          <div class="mb-4">
             <label for= 'password' class='sr-only'>Lozinka</label>
             <input type= 'password' name= 'password' id= 'password' placeholder="Unesite lozinku" class='bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror' >
             @error('password')
               <div class="text-red-500 mt-2 text-sm">
                  {{$message}}
               </div>
             @enderror
          </div>
            <!--Confirm pass -->
          <div class="mb-4">
             <label for= 'password_confirmation' class='sr-only'>Potvrda lozinke</label>
             <input type= 'password' name= 'password_confirmation' id='password_confirmation' placeholder="Ponovite lozinku" class='bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror' >
             @error('password_confirmation')
               <div class="text-red-500 mt-2 text-sm">
                  {{$message}}
               </div>
             @enderror
          </div>
            <!-- End fields -->
            <!-- Buttons -->
          <div class="flex justify-evenly">
             <button type="submit" class="bg-blue-500 text-white px-4 py-3 mx-2 rounded font-medium w-full">Registruj se!</button>
             <button type="reset" class="bg-gray-500 text-white px-4 py-3 mx-2 rounded font-medium w-full">Resetuj!</button>
          </div>
            <!-- End buttons -->
      </form>
        <!-- End register form -->
    </div>
  </div>
    <!-- End register -->
@endsection
