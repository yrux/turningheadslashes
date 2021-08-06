<div class="col-md-4">
    <div class="new-arrv-blk">
        @if($product->discount>0)
        <div class="off-sell">
            <p>{{$product->discount}}% off</p>
        </div>
        @endif
        <span data-id="{{$product->id}}" onclick="addToWishList(this)" class="like"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
        <h5>{{$product->name}}</h5>
        <img src="{{asset($product->image->url)}}" alt="">
        @if($product->discount>0)
        <h6>${{Helper::discountedValue($product->price, $product->discount, true)}}</h6>
        @else
        <h6>${{Helper::discountedValue($product->price, 0, true)}}</h6>
        @endif
        <ul>
            <li><span class="color1">1</span></li>
            <li><span class="color2">2</span></li>
            <li><span class="color3">3</span></li>
            <li><span class="color4">4</span></li>
        </ul>
        <a href="{{route('ecommerce.product.detail',[$product])}}"><img src="{{asset('images/btn-icon.png')}}" alt="">Add to cart</a>
    </div>
</div>