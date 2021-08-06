@extends('layouts.main')
@section('content')
<!-- inn Slide Sec Start -->
@if(!$category->name)
<section class="product-banner">
    <div class="container">
    <div class="our-products-cap">
        <?php Helper::inlineEditable("h3", "", 'Our Products', 'PRODUCTSLIST'); ?>
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
      <?php Helper::inlineEditable("h3", "", 'Our Products', 'PRODUCTSLIST'); ?>
      <?php Helper::inlineEditable("p", "", 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'PRODUCTSLIST'); ?>
      </div>
      <div class="row">
        @foreach($products as $product)
            @include('extends.product_card',['product'=>$product])
        @endforeach
        @if($products->count()==0)
            <h2 class="text-center">No Products in this category</h2>
        @endif
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