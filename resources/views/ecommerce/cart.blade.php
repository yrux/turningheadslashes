@extends('layouts.main')
@section('content')
@include('extends.banner',['bannerTitle'=>$title])
<section class="checkout-sec padding-70">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="inner-heading">
                    <a href="{{route('ecommerce.products')}}">Continue Shopping</a>
                </div>
            </div>
            <div class="cart-page">
                <div class="xv-cart pt-60">
                    <div class="xv-cart-top pb-45">
                        <div class="table-responsive cart-cal">
                            <table class="table">
                                <tbody class="shadow-around">
                                    <?php $total = 0; ?>
                                    @foreach($cart as $cark=>$car)
                                        <tr class="table-body">
                                            <td width="15%" class="text-center"><img src="images/product-detail-img-01.jpg"></td>
                                            <td>
                                                <div class="rank">
                                                    <!-- <ul>
                                                        <li> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </li>
                                                    </ul> -->
                                                </div>
                                                <div class="detail-heading">
                                                    <h2>{{$car['product']->name}}</h2>
                                                    <h4>{{$car['product']->category->name}}</h4>
                                                </div>
                                            </td>
                                            <td class="text-left discount-sec ">
                                                @if($car['product']->discount>0)
                                                <span class="cart-price">${{Helper::discountedValue($car['product']->price, $car['product']->discount,true)}}</span>
                                                @else
                                                <span class="cart-price">${{Helper::discountedValue($car['product']->price, 0,true)}}</span>
                                                @endif
                                                @if($car['product']->discount>0)
                                                <div class="detail-heading t">
                                                    <h4>Special Discount {{$car['product']->discount}}%</h4>
                                                </div>
                                                @endif
                                            </td>
                                            <td class="number-sec-count"><input disabled data-pid="{{$cark}}" type="number" value="{{$car['qty']}}"></td>
                                            <td class="text-center">
                                                <span class="cart-price">${{Helper::discountedValue($car['total'], $car['product']->discount, true)}}</span>
                                                <div class="cancel_div"><a href="{{route('ecommerce.cart.remove',[$cark])}}"> X</a></div>
                                            </td>
                                        </tr>
                                        <?php 
                                        $total+=Helper::discountedValue($car['total'], $car['product']->discount);
                                        //$total+=$car['total']; 
                                        ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="cart-sec-detail">
                    <div class="col-md-4 col-sm-4">
                        <!-- <div class="method-sec">
                            <div class="heading-cart-detail">
                                <h2>Select Payment Method</h2>
                            </div>

                            <div class="paypal-select">
                                <ul>
                                    <li>
                                        <span>Credit Card</span>
                                        <input type="radio" id="radio1" name="radio-group" checked="">
                                        <label for="radio1"> <img src="images/cart-img-01.png" class="img-responsive"></label>
                                    </li>
                                    <li>
                                        <span>American Express</span>
                                        <input type="radio" id="radio2" name="radio-group">
                                        <label for="radio2"> <img src="images/cart-img-02.png" class="img-responsive"></label>
                                    </li>
                                    <li>
                                        <span>Pay Pal</span>
                                        <input type="radio" id="radio3" name="radio-group">
                                        <label for="radio3"> <img src="images/cart-img-03.png" class="img-responsive"></label>
                                    </li>
                                </ul>
                            </div>

                            <div class="btn-detail">
                                <a href="#">UPDATE</a>
                            </div>
                        </div> -->
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <div class="method-sec">
                            <div class="heading-cart-detail">
                                <h2>Cart Total</h2>
                            </div>

                            <div class="total-detail-sec">
                                <ul>
                                    <li>Sub Total : ${{Helper::discountedValue($total, 0, true)}}</li>
                                    <li>Shipping Charge : N/A</li>
                                    @if($discountEnabled===true)
                                        <li>Promo Discount : {{$discountValue}}%</li>
                                    @endif
                                </ul>

                                <h2>ORDER TOTAL <span>${{Helper::discountedValue($total, $discountValue, true)}}</span></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <div class="method-sec">
                            <div class="heading-cart-detail">
                                <h2>APPLY COUPON CODE</h2>
                            </div>

                            <div class="promo-code">
                                <h3>Have Promo Code ?</h3>
                                <ul>
                                    <li>CODE ; <span>00xx123</span></li>
                                </ul>

                                <form method="POST" action="{{route('ecommerce.cart.applycoupon')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <input type="text" name="code" class="form-control" placeholder="Enter Code">
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <div class="btn-form-detail">
                                                <input type="submit" value="Apply">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="process-btn-sec">
                    <div class="btn-detail">
                        <a href="{{route('ecommerce.product.checkout')}}">PROCED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
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