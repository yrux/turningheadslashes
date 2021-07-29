@extends('layouts.main')
@section('content')
<!-- inn Slide Sec Start -->
@if(!$category->name)
<section class="product-banner">
    <div class="container">
    <div class="our-products-cap">
        <h3>Our Products</h3>
    </div>
    </div>
</section>
@else
<section class="accessories banner{{$category->id}}">
    <div class="container">
    <div class="accessories-cap">
        <h3>{{$title}}</h3>
    </div>
    </div>
</section>
@endif
<!-- inn Slide Sec End -->

<section class="new-arriv-sec related-prod lashs-pg">
    <div class="container">
      <div class="new-arrv-title">
        <h3>Our Products</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
      </div>
      <div class="row">
        @foreach($products as $product)
            <div class="col-md-4">
            <div class="new-arrv-blk">
                @if($product->discount>0)
                <div class="off-sell"><p>{{$product->discount}}% off</p></div>
                @endif
                <span class="like"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                <h5>{{$product->name}}</h5>
                <img src="{{asset($product->image->url)}}" alt="">
                <h6>${{$product->price}}</h6>
                <ul>
                    <li><span class="color1">1</span></li>
                    <li><span class="color2">2</span></li>
                    <li><span class="color3">3</span></li>
                    <li><span class="color4">4</span></li>
                </ul>
                <a href="{{route('ecommerce.product.detail',[$product])}}"><img src="{{asset('images/btn-icon.png')}}" alt="">Add to cart</a>
            </div>
            </div>
        @endforeach
      </div>
    </div>
  </section>

@endsection
@section('css')
<style type="text/css">
    /*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">

</script>
@endsection