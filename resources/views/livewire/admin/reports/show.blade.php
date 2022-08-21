<div class="flex flex-col items-center">
  <div class="flex flex-row justify-center gap-3">
    <p class="font-bold">Generiši za mesec: </p>
    <select  wire:model="month" name="month filter" class="w-fit">
      <!-- Month filters .. hardcoded .. -->
      <option value="1">Januar</option>
      <option value="2">Februar</option>
      <option value="3">Mart</option>
      <option value="4">April</option>
      <option value="5">Maj</option>
      <option value="6">Jun</option>
      <option value="7">Jul</option>
      <option value="8">Avgust</option>
      <option value="9">Septembar</option>
      <option value="10">Oktobar</option>
      <option value="11">Novembar</option>
      <option value="12">Decembar</option>
    </select>
  </div>

  <div class="flex flex-col justify-center w-full border border-black h-fit">
    @foreach($orderReport as  $data)
     <p>{{$data->status}}    Kolicina: {{$data->count}} Kes: {{$data->total}}</p>
    @endforeach
    <p class="font-bold">AAAAAAAAAAAAAAAA</p>
    @foreach($userReport as $data)
      <p>{{$data->user_id}}    Kolicina: {{$data->count}} Kes: {{$data->total}}</p>
    @endforeach
      <p class="font-bold">AAAAAAAAAAAAAAAA</p>
    @foreach($productQuantities as $product => $quantity)
    @endforeach
      <p class="font-bold">AAAAAAAAAAAAAAAA</p>
    <p>Ukupno narudzbina: {{$totalOrders}}</p>
    <p>Knjiga prodato: {{$totalProducts}}</p>
    <p>Zaradjeno: {{$totalIncome}}</p>
    <p>Novih korisnika: {{$newUsers}}</p>

  </div>
</div>
