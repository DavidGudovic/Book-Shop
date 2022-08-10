@extends('templates.app')

@section('content')
  <!-- Register -->
  <div class="flex justify-center align-middle text-center my-10">
    <div class="flex flex-col gap-10">
      <h1 class="text-2xl font-bold text-center">Registracija korisnika</h1>
      <div class="w-4/12 min-w-[400px] p-6 m-3 rounded-lg border-2 border-gray-800 shadow-xl shadow-gray-800">

        <!--Status message display-->
        @if(session()->has('status'))
          <p class='text-center font-bold mb-5
          @if(session('status') == 'error') text-red-600 @else text-green-400 @endif'>{{session('status_msg')}}</p>
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
               <input type="text" name="username" id='username' placeholder="Unesite korisničko ime"
               class='form-control @error('username') border-red-500 @enderror' value='{{old('username')}}'>
               @error('username')
                 <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                 </div>
               @enderror
            </div>
              <!-- Email -->
            <div class="mb-4">
               <label for='email' class='sr-only'>Email</label>
               <input type="text" name="email" id='email' placeholder="Unesite email"
               class='form-control @error('email') border-red-500 @enderror' value='{{old('email')}}'>
               @error('email')
                 <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                 </div>
               @enderror
            </div>
              <!-- Name -->
            <div class="mb-4">
               <label for='name' class='sr-only'>Ime</label>
               <input type="text" name="name" id='name' placeholder="Unesite ime i prezime"
               class='form-control @error('name') border-red-500 @enderror' value='{{old('name')}}'>
               @error('name')
                 <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                 </div>
               @enderror
            </div>
              <!-- pass -->
            <div class="mb-4">
               <label for= 'password' class='sr-only'>Lozinka</label>
               <input type= 'password' name='password' id='password' placeholder="Unesite lozinku"
                 class='form-control @error('password') border-red-500 @enderror' >
               @error('password')
                 <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                 </div>
               @enderror
            </div>
              <!--Confirm pass -->
            <div class="mb-4">
               <label for='password_confirmation' class='sr-only'>Potvrda lozinke</label>
               <input type='password' name='password_confirmation' id='password_confirmation' placeholder="Ponovite lozinku"
               class='form-control @error('password') border-red-500 @enderror' >
            </div>
              <!-- End fields -->
              <!-- Buttons -->
            <div class="flex justify-evenly">
               <button type="submit" class="form-btn">Registruj se!</button>
               <button type="reset" class="form-btn bg-gray-500">Resetuj!</button>
            </div>
              <!-- End buttons -->
        </form>
          <!-- End register form -->
      </div>

    </div>
  </div>
  <!-- End register -->
@endsection
