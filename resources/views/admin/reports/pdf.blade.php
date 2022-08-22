<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Izveštaj</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <style type="text/css">
  * {
    font-family: DejaVu Sans, sans-serif;;
  }
  table{
    font-size: x-small;
  }
  tfoot tr td{
    font-weight: bold;
    font-size: x-small;
  }
  .centered{
    text-align:  center;
  }
  .small{
    font-size: x-small;
  }

  .gray {
    background-color: lightgray
  }
  </style>
</head>
<body>
  <!-- Header -->
  <table width="100%">
    <tr>
      <td valign="top" align="left">
        <img src="{{public_path('images/util/logo.jpg')}}" width="150" alt="">
      </td>
      <td valign="top" align="right">
        <h3>Aurora D.O.O.</h3>
        <pre>
          Menadžer: {{$menager}}
          Savski nasip 7, Beograd 11000, Srbija
          PIB: 92382317
          067/ 010-010
        </pre>
      </td>
    </tr>
  </table>
  <!-- End header -->

  <!--- Heading -->
  <h3 class="centered">Mesečni izveštaj za @if($month < 10)<span>0</span>@endif{{$month}}.2022</h3>
    <p class="centered small">Generisan: {{$generated_at}}</p>
    <!--- End heading -->

    <!-- Order table heading -->
    <table width="100%">
      <tr>
        <td><strong>Narudžbine</strong></td>
      </tr>
    </table>
    <!-- End heading -->

    <!-- Order data -->
    <table width="100%">
      <thead style="background-color: lightgray;">
        <tr>
          <th>#</th>
          <th>Status</th>
          <th>Broj narudžbi</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Neobrađena</td>
          <td align="right">{{$orderReport[1]->count}}</td>
          <td align="right">{{$orderReport[1]->total}} RSD</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Uspešna</td>
          <td align="right">{{$orderReport[2]->count}}</td>
          <td align="right">{{$orderReport[2]->total}} RSD</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Otkazana</td>
          <td align="right">{{$orderReport[3]->count}}</td>
          <td align="right">{{$orderReport[3]->total}} RSD</td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Refundirana</td>
          <td align="right">{{$orderReport[4]->count}}</td>
          <td align="right">{{$orderReport[4]->total}} RSD</td>
        </tr>
      </tbody>

      <tfoot>
        <tr>
          <td colspan="1"></td>
          <td align="right">Ukupno narudžbi</td>
          <td align="right" class="gray">{{$totalOrders}}</td>
        </tr>
      </tfoot>
    </table>
    <!-- End order data -->
  </br></br>
  <!-- Order table heading -->
  <table width="100%">
    <tr>
      <td><strong>Proizvodi</strong></td>
    </tr>
  </table>
  <!-- End heading -->
  <!-- Product data-->
  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Naslov</th>
        <th>Prodatih kopija</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      @foreach($productQuantities as $productId => $quantity)
        <tr>
          <th scope="row">{{$productId}}</th>
          <td>{{$products[$productId]->title}}</td>
          <td align="right">{{$quantity}}</td>
          <td align="right">{{$productTotals[$productId]}} RSD</td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="1"></td>
        <td align="right">Ukupno prodato</td>
        <td align="right" class="gray">{{$totalProducts}}</td>
      </tr>
    </tfoot>
  </table>
  <!--End product data-->
</body>
</html>
