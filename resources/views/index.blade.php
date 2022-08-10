@extends('templates.app')

@section('header')
  <header class="h-[300px] bg-gradient-to-b md:bg-gradient-to-l from-blue-400 to-purple-400 flex items-center justify-center">
    <svg width="1282" height="212" viewBox="0 0 1282 212" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g clip-path="url(#clip0_31_2)">
        <path d="M402.768 87.6889C390.876 146.553 356.064 211.801 301.699 211.801C269.014 211.801 249.903 195.279 246.913 157.155C242.241 91.9297 319.127 97.01 314.875 44.0652C312.218 18.8187 290.583 21.4471 272.468 30.2381C263.278 34.6999 252.627 27.7422 252.627 17.5597C252.627 17.383 252.627 17.2284 252.627 17.0516C252.627 9.98351 257.941 4.10812 264.961 3.18043C289.785 -0.132765 316.16 13.2525 318.684 43.6234C322.936 88.0864 282.588 93.1888 286.84 152.495C289.387 191.878 316.16 212.64 342.468 193.578C381.974 165.195 402.768 91.5101 402.768 47.4446V0.419434H440.148V211.779H402.768V87.6889Z" fill="#0D0D0D"/>
        <path d="M540.087 86.408C543.054 60.9848 557.492 29.642 575.762 16.1021C596.666 0.64055 621.867 -1.08231 646.935 1.59033C654.553 2.40758 660.266 8.92353 660.266 16.566C660.266 27.3228 649.371 34.4351 639.339 30.4593C627.625 25.8208 614.316 22.3751 603.354 22.861C543.054 22.0217 539.666 97.4078 540.087 141.054V211.801H501.865V0H540.087V86.408Z" fill="#0D0D0D"/>
        <path d="M888.755 105.912C888.755 148.696 860.299 185.958 821.236 202.06C776.215 220.703 724.397 212.641 689.165 181.298C633.094 130.473 647.533 46.1859 717.2 12.2809C733.742 4.24088 753.296 0 771.986 0C833.548 0 888.755 44.9048 888.755 105.912ZM686.618 67.3461C683.208 92.3276 689.585 120.711 703.603 144.853C717.621 169.414 737.994 186.798 759.23 195.699C781.729 205.02 807.218 205.86 826.75 194.418C843.735 184.258 853.921 166.035 856.911 144.433C863.709 94.0283 832.707 36.0033 784.298 16.08C760.515 5.91957 739.278 5.91957 716.358 17.7808C698.089 27.5437 689.165 47.0252 686.618 67.3461Z" fill="#0D0D0D"/>
        <path d="M961.123 86.408C964.091 60.9848 978.529 29.642 996.799 16.1021C1017.7 0.64055 1042.9 -1.08231 1067.97 1.59033C1075.59 2.40758 1081.3 8.92353 1081.3 16.566C1081.3 27.3228 1070.41 34.4351 1060.38 30.4593C1048.68 25.8208 1035.37 22.3751 1024.39 22.861C964.091 22.0217 960.681 97.4078 961.101 141.054V211.801H922.88V0H961.101V86.408H961.123Z" fill="#0D0D0D"/>
        <path d="M1244.62 142.313C1228.06 160.115 1210.23 176.195 1192.38 188.498C1169.44 204.181 1145.23 213.48 1119.35 211.801C1093.86 210.1 1064.98 196.119 1067.53 166.896C1070.94 112.671 1153.74 104.631 1199.6 92.3497C1275.2 72.4484 1262.03 4.24088 1194.09 4.24088C1165.92 4.24088 1134.47 19.4595 1120.32 44.3967C1116.07 51.8846 1106.57 54.4909 1099.46 49.6316C1091.38 44.1096 1091 32.16 1098.86 26.3288C1125.26 6.80308 1161.44 0 1194.09 0C1222.12 0 1280.29 5.94166 1282 41.945C1282.42 55.9266 1275.2 66.5068 1258.22 75.8279C1242.07 84.7293 1217.03 92.7693 1181.77 101.671C1077.29 129.634 1098.53 246.104 1189.83 184.699C1222.76 162.346 1251.93 127.911 1268.23 106.663C1272.7 100.831 1281.98 104.034 1281.98 111.367V211.801H1244.6V142.313H1244.62Z" fill="#0D0D0D"/>
        <path d="M177.246 142.313C160.682 160.115 142.855 176.195 125.007 188.498C102.065 204.181 77.8607 213.48 51.9735 211.801C26.485 210.1 -2.39165 196.119 0.154991 166.896C3.56527 112.671 86.3642 104.631 132.226 92.3276C207.828 72.4263 194.652 4.24088 126.712 4.24088C98.5438 4.24088 67.0984 19.4595 52.9479 44.3967C48.6961 51.8846 39.1961 54.4909 32.0876 49.6316C24.0048 44.1096 23.6284 32.16 31.4897 26.3288C57.8862 6.80308 94.0706 0 126.712 0C154.747 0 212.921 5.94166 214.626 41.945C215.047 55.9266 207.828 66.5068 190.843 75.8279C174.699 84.7293 149.654 92.7693 114.399 101.671C9.9208 129.612 31.1575 246.104 122.46 184.677C155.389 162.324 184.554 127.889 200.852 106.641C205.325 100.809 214.604 104.012 214.604 111.345V211.779H177.246V142.313Z" fill="#0D0D0D"/>
      </g>
      <defs>
        <clipPath id="clip0_31_2">
          <rect width="1282" height="212" fill="white"/>
        </clipPath>
      </defs>
    </svg>
  </header>
@endsection

@section('content')
  <div class="flex flex-col items-center justify-center">
    <!--Recommendations-->
    <h2 class='font-bold text-3xl my-20'>Naša preporuka</h2>

    <!-- List of recommended books -->
    <div class="flex flex-wrap justify-center gap-32">
      @foreach($recommends as $recommended)
        <!-- Book -->
        <div class="flex flex-col w-[350px]">
          <img src="{{URL('/images/' . $recommended->image)}}" class="h-[500px]" alt="">
          <p class='text-2xl font-bold mt-2'>{{$recommended->name}}</p>
          <!-- Authors -->
          <p>
            @foreach($recommended->authors as $author)
              {{$author->name}}
              @if(!$loop->last)
                ,
              @endif
            @endforeach
          </p>
          <!-- End Authors -->
          <p class="mt-4 h-36 line-clamp-6">{{$recommended->synopsis}}</p>
          <div class="flex justify-between items-center mt-3">
            <a href="{{route('books.show', $recommended)}}" class="rounded-3xl bg-black text-white px-4 py-2" name="button">Više informacija</a>
            <p class="text-2xl">{{$recommended->price}} RSD</p>
            <a href=""><i class="fa-solid fa-cart-shopping fa-2x"></i></a>
          </div>
        </div>
        <!-- End of book -->
      @endforeach
    </div>
    <!-- End of list -->
    <!--End recommendations -->

    <!-- Product offer -->
    <h2 class='font-extrabold text-3xl my-20'>Naša ponuda</h2>

    <!-- EXPERIMENTAL -->
    <div class="flex flex-row gap-6 overflow-x-scroll my-5 mb-40">
      <img src={{URL('images/noimage.jpg')}} alt="">
      <img src={{URL('images/noimage.jpg')}} alt="">
      <img src={{URL('images/noimage.jpg')}} alt="">
      <img src={{URL('images/noimage.jpg')}} alt="">
      <img src={{URL('images/noimage.jpg')}} alt="">
      <img src={{URL('images/noimage.jpg')}} alt="">
      <img src={{URL('images/noimage.jpg')}} alt="">
    </div>
    <!-- END EXPERIMENTAL -->

    <!--Categories-->
    <div class="flex flex-wrap justify-evenly p-10 w-full rounded-t-lg bg-gradient-to-b from-blue-400 to-purple-400
                 md:rounded-lg md:mb-20 md:bg-gradient-to-l ">
      <!-- Fiction -->
      <div class="flex flex-col align-center text-center w-1/2 min-w-full md:min-w-[400px] gap-40 mb-40 md:mb-0">
        <h3 class='font-bold text-3xl'>Beletristika</h3>
        @foreach($fictionCategories as $category)
          <a class='text-2xl' href="{{route('books.index',
            ['category' => 'fiction', 'subcategory' => $category->id])}}">{{$category->name}}</a>
          @endforeach
        </div>
        <!--Non fiction-->
        <div class="flex flex-col align-center text-center w-1/2 min-w-full md:min-w-[400px] gap-40">
          <h3 class='font-bold text-3xl'>Popularna nauka</h3>
          @foreach($nonFictionCategories as $category)
            <a class='text-2xl' href="{{route('books.index',
              ['category' => 'nonFiction', 'subcategory' => $category->id])}}">{{$category->name}}</a>
            @endforeach
          </div>
        </div>
        <!--End categories-->

        <!-- End product offer-->
      </div>
    @endsection
