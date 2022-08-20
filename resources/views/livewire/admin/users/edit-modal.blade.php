<div>
  <x-modal wire:model="showModal">
    <div class="flex flex-col bg-white rounded-lg transform z-50 w-full h-fit md:w-96" x-show="showModal">
      <x-close-button/>
      @if($user)
        <!-- Edit form -->
        <form wire:submit.prevent="submit" class="flex flex-col w-full  gap-4 p-6 items-center">
          <p class="font-bold">Izmena korisnika</p>

          <!-- Username -->
          <div class="w-full">
            <p class="w-full font-bold">Korisničko ime</p>
            <input class="w-full border border-black @error('user.username') border-red-500 @enderror" type="text" name="username" wire:model="user.username">
              @error('user.username')
                <div class="text-red-500 mt-2 text-sm">
                   {{$message}}
                </div>
              @enderror
          </div>



          <!-- Email -->
          <div class="w-full">
            <p class="w-full font-bold">Email</p>
            <input class="w-full border border-black @error('user.email') border-red-500 @enderror" type="text" name="email" wire:model="user.email">
              @error('user.email')
                <div class="text-red-500 mt-2 text-sm">
                   {{$message}}
                </div>
              @enderror
          </div>

          <!-- Name -->
          <div class="w-full">
            <p class="w-full font-bold">Ime</p>
            <input class="w-full border border-black @error('user.name') border-red-500 @enderror" type="text" name="name" wire:model="user.name">
              @error('user.name')
                <div class="text-red-500 mt-2 text-sm">
                   {{$message}}
                </div>
              @enderror
          </div>

          <!--Password  -->
          <div class="w-full">
            <p class="w-full font-bold">Lozinka</p>
            <input class="w-full border border-black @error('new_password') border-red-500 @enderror" type="password" name="pass" placeholder="Prazno ako ne menjate" wire:model="new_password">
              @error('new_password')
                <div class="text-red-500 mt-2 text-sm">
                   {{$message}}
                </div>
              @enderror
          </div>

          <!-- Role -->
          <div class="flex flex-row w-full gap-4 mt-2">
            <p class="font-bold">Rola</p>
            <select class="border border-black w-full @error('user.role') border-red-500 @enderror" name="role" wire:model="user.role">
              <option value="client">Klijent</option>
              <option value="admin">Administrator</option>
            </select>
            @error('user.role')
              <div class="text-red-500 mt-2 text-sm">
                 {{$message}}
              </div>
            @enderror
          </div>

          <input type="submit" name="submit" value="Sačuvaj" class="px-4 py-2 text-center bg-black text-white">

        </form>
        <!-- End form -->
      @endif
    </div>
  </x-modal>
</div>
