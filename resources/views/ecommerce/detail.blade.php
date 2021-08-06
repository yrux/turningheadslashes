@extends('layouts.main')
@section('content')
<!-- inn Slide Sec Start -->
@include('extends.banner',['bannerTitle'=>$product->name])
<!-- inn Slide Sec End -->


<!-- product detail -->
<section class="main-pro-dtail inpage">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12"></div>
    </div>
    <div class="row">
      <div class="col-md-6 col-xs-12 col-sm-12">
        <div class="productBox">
          <div class="slider-for">
            <div> <img alt="img" class="img-responsive" src="{{asset($product->image->url)}}">
              <div class="half-at"> <a class="info-btn" data-fancybox="gallery" href="{{asset($product->image->url)}}"><img alt="img" src="{{asset('images/stich.png')}}"></a> </div>
            </div>
            @foreach($multi as $mult)
            <div> <img alt="img" class="img-responsive" src="{{asset($mult->img_path)}}">
              <div class="half-at"> <a class="info-btn" data-fancybox="gallery" href="{{asset($mult->img_path)}}"><img alt="img" src="{{asset('images/stich.png')}}"></a> </div>
            </div>
            @endforeach
          </div>
        </div>
        <div class="2-nav">
          <div><div class="thumbs"><img alt="img" class="img-responsive" src="{{asset($product->image->url)}}"></div></div>
            @foreach($multi as $mult)
            <div><div class="thumbs"><img alt="img" class="img-responsive" src="{{asset($mult->img_path)}}"></div></div>
            @endforeach
        </div>
      </div>
      <div class="col-md-6 col-xs-12 col-sm-12">
        <div class="detail-name">
          <h1>{{$product->name}} <span>|</span> ${{$product->price}}</h1>
          <h2>{{$product->short_description}}</h2>
          <?php print $product->description; ?>

          <ul class="colr-blk">
                <li><span class="color1">1</span></li>
                <li><span class="color2">2</span></li>
                <li><span class="color3">3</span></li>
                <li><span class="color4">4</span></li>
              </ul>

          <div class="wunty-check">
            <h1>Quantity</h1>
            <div class="input-group"> <span class="input-group-btn">
              <button class="btn btn-default btn-number" data-field="quant[1]" data-type="minus" type="button"><span class="input-group-btn"><span class="input-group-btn"><i class="fa fa-minus"></i></span></span></button>
              </span>
              <input id="qty" class="form-control input-number" min="1" name="quant[1]" type="text" value="1">
              <span class="input-group-btn">
              <button class="btn btn-default btn-number" data-field="quant[1]" data-type="plus" type="button"><span class="input-group-btn"><span class="input-group-btn"><i class="fa fa-plus"></i></span></span></button>
              </span> </div>
           
          </div>
          <div class="clearfix"></div>
          <div class="truck-text">
            <p><i aria-hidden="true" class="fa fa-truck"></i>Lorem ipsum dolor sit amet</p>
            <p><i aria-hidden="true" class="fa fa-pencil"></i>Lorem ipsum dolor sit amet</p>
          </div>
          <div class="clearfix"></div>
          <div class="add-cart-btn"> <a href="javascript:void(0)" onclick="addCart()">Add To Cart</a> </div>
        </div>
      </div>

  </div>
</section>
<!-- product detail --> 

@if($related_products)
 <section class="new-arriv-sec related-prod">
    <div class="container">
      <div class="new-arrv-title">
        <h3>Related Products</h3>
      </div>
      <div class="row">
        @foreach($related_products as $related_product)
          @include('extends.product_card',['product'=>$related_product])
        @endforeach
      </div>
    </div>
  </section>
@endif
@endsection
@section('css')
<style type="text/css">
    /*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
$('.2-nav').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: false,
  centerMode: true,
  focusOnSelect: true
});
function addCart () {
  var qty = $('#qty').val(), id = {{$product->id}};
  ajaxifyN({
    qty : qty,
    id: id
  },'POST','{{route('ecommerce.product.addcart')}}').then(function(e){
    generateNotification(e.status,e.data);
  });
}
</script>
@endsection