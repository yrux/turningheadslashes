@extends('layouts.main')
@section('content')
<!-- Home Slide Sec Start -->
<section class="home-slide">
  <div class="container">
    <div class="slide-cap">
      <?php Helper::inlineEditable("h3", "", '20% off', 'WELCOME'); ?>
      <?php Helper::inlineEditable("h2", "", 'strip lashes', 'WELCOME'); ?>
      <a href="{{route('ecommerce.products')}}">Shop Now</a>
    </div>
  </div>
</section>
<!-- Home Slide Sec End -->
<section class="new-arriv-sec">
  <div class="container">
    <div class="new-arrv-title">
      <?php Helper::inlineEditable("h3", "", 'New Arrival', 'WELCOME'); ?>
      <?php Helper::inlineEditable("p", "", 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'WELCOME'); ?>
    </div>
    <div class="row">
      @foreach($products as $product)
      @include('extends.product_card',['product'=>$product])
      @endforeach
    </div>
  </div>
</section>
@if($homeProduct>0)
<!-- Strip Lashes Sec Start -->
<section class="strip-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="slider slider-for">
          <div class="strip-img-blk">
            <img src="{{asset($homeProductData->image->url)}}" alt="">
          </div>
          @if($homeProductData->optionalimages)
          @foreach($homeProductData->optionalimages as $images)
          <div class="strip-img-blk">
            <img src="{{asset($images->img_path)}}" alt="">
          </div>
          @endforeach
          @endif
        </div>
      </div>
      <div class="col-md-6">
        <div class="strip-blk">
          <h3>{{$homeProductData->name}}</h3>
          <!-- <h4>Siberian mink strip lashes</h4> -->
          <p>{{$homeProductData->short_description}}</p>
          <ul>
            <li><span class="color1">1</span></li>
            <li><span class="color2">2</span></li>
            <li><span class="color3">3</span></li>
            <li><span class="color4">4</span></li>
          </ul>
          <a class="strip-blk-btn1" href="{{route('ecommerce.product.detail',[$homeProductData])}}">Add to cart</a><a class="strip-blk-btn2" href="">${{Helper::discountedValue($homeProductData->price, $homeProductData->discount, true)}}</a>
        </div>
      </div>
    </div>
    <div class="row prod-nav">
      <div class="col-md-12">
        <div class="slider slider-nav">
          <div class="strip-img-blk">
            <img src="{{asset($homeProductData->image->url)}}" alt="">
          </div>
          @if($homeProductData->optionalimages)
          @foreach($homeProductData->optionalimages as $images)
          <div class="strip-img-blk">
            <img src="{{asset($images->img_path)}}" alt="">
          </div>
          @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Strip Lashes Sec End -->
@endif
<!-- Beauty Queen Sec Start -->
<section class="beauty-queen">
  <div class="container">
    <div class="beauty-aueen-title">
    <?php Helper::inlineEditable("h3", "", 'Best lashes for the beauty queen.', 'WELCOME'); ?>
    <?php Helper::inlineEditable("p", "", 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.', 'WELCOME'); ?>
    </div>
    <div class="beauty-quen-blk">
      <img src="{{asset('images/beauty-quen-blk-img3.jpg')}}" alt="">
    </div>
  </div>
</section>
<!-- Beauty Queen Sec End -->
<!-- News Testimonis Sec Strat -->
<section class="news-tmls-sec">
  <div class="container">
    <div class="row">

      <div class="col-md-6">
        <div class="news-blk-main">
          <h3>News</h3>
          @foreach($news as $new)
          <div class="news-blk">
            <h5>{{$new->title}}</h5>
            <span>{{date('F d, Y',strtotime($new->created_at))}}</span>
            <p>{{$new->short_description}}</p>
          </div>
          @endforeach
          @if($totalNews>2)
          <a href="{{route('news')}}">View All News</a>
          @endif
        </div>
      </div>

      <div class="col-md-6">
        <div class="tmls-blk-main">
          <h3>Testimonials</h3>

          <div class="tmls-slide">
            @foreach($testimonials as $testimonial)
            <div class="row">
              <div class="col-md-4">
                <div class="tmls-img">
                  <img src="{{asset($testimonial->image->url)}}" alt="">
                </div>
              </div>
              <div class="col-md-8">
                <div class="tmls-blk">
                  <h5>{{$testimonial->name}}</h5>
                  <h6>{{$testimonial->position}}</h6>
                  <p>{{$testimonial->comment}}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<!-- News Testimonis Sec End -->
@endsection
@section('css')
<style type="text/css">
  /*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
  (() => {
    /*in page css here*/
  })()
</script>
@endsection