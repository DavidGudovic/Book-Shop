@extends('templates.user-profile')

@section('window')
  <div class="flex h-full w-full flex-row border border-black">

  </div>
@endsection

@section('filters')
  <div class="flex flex-col border border-black px-8 md:w-72">
    <form class="flex flex-col gap-1 py-4 "action="index.html" method="post">
      <p class="font-bold text-center">Filteri</p>
      <p>Status</p>
      <select class="" name="">
        <option value="">Obrađuje se</option>
        <option value="">Refundirana</option>
        <option value="">Odbijena</option>
      </select>
      <div class="flex flex-row gap-6 mt-4">
        <button type="submit" class="form-btn py-1">Primeni</button>
        <button type="reset" class="form-btn bg-gray-500 py-1">Resetuj</button>
      </div>
    </form>
  </div>
@endsection
