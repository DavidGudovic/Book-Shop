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
        <?php
          $svg = '<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
              width="150pt" height="150pt" viewBox="0 0 355.000000 300.000000"
              preserveAspectRatio="xMidYMid meet">

              <g transform="translate(0.000000,300.000000) scale(0.100000,-0.100000)"
              fill="#000000" stroke="none">
              <path d="M0 1500 l0 -1500 1775 0 1775 0 0 1500 0 1500 -1775 0 -1775 0 0
              -1500z m2138 1355 c255 -26 395 -61 557 -140 149 -72 232 -156 270 -273 25
              -77 17 -198 -18 -275 -90 -198 -417 -360 -1062 -527 -214 -56 -320 -92 -440
              -150 -123 -59 -181 -96 -280 -180 -195 -165 -315 -406 -302 -605 9 -134 70
              -244 167 -303 77 -46 121 -56 235 -56 88 1 113 5 207 37 185 63 338 152 553
              324 204 162 500 467 706 726 101 128 112 137 160 137 50 0 86 -34 94 -92 3
              -24 5 -315 3 -648 l-3 -605 -232 -3 -233 -2 0 436 0 437 -152 -151 c-358 -353
              -649 -553 -943 -650 -159 -53 -242 -66 -410 -66 -171 0 -275 23 -413 90 -103
              50 -198 133 -246 215 -76 131 -67 334 22 503 49 94 161 207 272 273 237 142
              419 202 1046 347 280 65 414 106 509 153 156 79 284 194 340 305 91 183 56
              371 -97 513 -73 68 -140 106 -258 147 -95 32 -96 32 -290 33 -183 0 -201 -2
              -294 -28 -259 -72 -483 -225 -610 -415 -74 -111 -117 -142 -197 -142 -95 0
              -161 66 -167 167 -4 55 -1 68 22 103 50 75 247 187 455 256 320 108 671 145
              1029 109z"/>
              </g>
              </svg>';

          $html = '<img src="data:image/svg+xml;base64,'.base64_encode($svg).'"  width="80" height="80" />';
          echo $html;
         ?>
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
          <td align="right">{{$orderReport[1]->count ?? 0}}</td>
          <td align="right">{{$orderReport[1]->total ?? 0}} RSD</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Uspešna</td>
          <td align="right">{{$orderReport[2]->count ?? 0}}</td>
          <td align="right">{{$orderReport[2]->total ?? 0}} RSD</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Otkazana</td>
          <td align="right">{{$orderReport[3]->count ?? 0}}</td>
          <td align="right">{{$orderReport[3]->total ?? 0}} RSD</td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Refundirana</td>
          <td align="right">{{$orderReport[4]->count ?? 0}}</td>
          <td align="right">{{$orderReport[4]->total ?? 0}} RSD</td>
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
