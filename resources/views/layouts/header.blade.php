<header>
  <!-- Begin: Top Row -->
  <div class="top-row">
    <div class="container">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6">
          <form method="GET" action="{{route('ecommerce.products')}}">
            <input type="text" name="q" placeholder="Search here ...">
            <button><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
        </div>
        <div class="col-md-2">
          <ul>
            <li><a href="{{route('login')}}"><img src="{{asset('images/login-icon.png')}}" alt=""></a></li>
            <li><a href="{{route('ecommerce.product.cart')}}"><img src="{{asset('images/cart-icon.png')}}" alt=""></a></li>
          </ul>
        </div>

      </div>
    </div>
  </div>
  <!-- END: Top Row -->

  <!-- Begin: Bottom Row -->
  <div class="bottom-row">
    <div class="container">
      <div class="row">

        <div class="col-md-2">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('home')}}">
              <?php
              print Helper::dynamicImages(asset('/'), 'images/logo.png', array("data-width" => "158", "data-height" => "150", "alt" => "logo", "class" => ""), 'logo', true);
              ?>
            </a>
          </div>
        </div>


        <div class="col-md-10">
          <nav class="navbar navbar-default">
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('ecommerce.products')}}">Products</a></li>
                <?php
                $headerCategories = Helper::returnMod('category')->where('show_in_menu', 1)->orderBy('id', 'asc')->get();
                ?>
                @foreach($headerCategories as $headerCategory)
                <li><a href="{{route('ecommerce.products',[$headerCategory])}}">{{$headerCategory->name}}</a></li>
                @endforeach
                <li><a href="{{route('contactus')}}">Contact Us</a></li>
              </ul>
              </li>
              </ul>
            </div>
          </nav>
        </div>

      </div>
    </div>
  </div>
  <!-- END: Bottom Row -->
</header>