@extends('layouts.main')
@section('content')
@include('extends.banner',['bannerTitle'=>$title])
<section class="checkout-sec padding-70">
    <div class="container">
        <div class="row">
            <div class="checkout-tab-main">
                <form id="inquiry_form" data-noinfo="true" data-customcallback="inquiry_success" data-customcallbackFail="inquiry_error" class="CrudForm" action="{{route('ecommerce.cart.createOrder')}}" method="POST">
                    @csrf
                    <div class="col-xs-12 col-sm-12 col-md-8">
                        <div class="form-sec-checkout">
                            <div class="checkout-heading">
                                <h2>Billing Address</h2>
                            </div>
                            <div class="form-tab ">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3">
                                            <label for="country_id">Country <span>*</span></label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <select class="form-control" required id="country_id" name="country_id">
                                                <option value="">
                                                    Please Select
                                                </option>
                                                @foreach($countries as $country)
                                                <option value="{{$country->id}}">
                                                    {{$country->country_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <label for="first_name">First Name <span>*</span></label>
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="first_name" name="first_name" required class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <label for="last_name">Last Name <span>*</span></label>
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="last_name" name="last_name" required class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <label for="company_name">Company Name <span>*</span></label>
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input name="company_name" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <label for="address_1">Address</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="address_1" name="address_1" required class="form-control" placeholder="Street Address" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                            <input id="address_2" name="address_2" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <label for="city">Town / City <span>*</span></label>
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input id="city" name="city" required class="form-control" placeholder="Town / City" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <label for="email">Email Address <span>*</span></label>
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input name="email" id="email" required class="form-control" type="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <label for="phone">Phone</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input name="phone" id="phone" required class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="checkoutSec">
                            <div class="checkoutBox">
                                <div class="checkoutHead">
                                    <h5>your order</h5>
                                </div>
                                <div class="checkoutBody">
                                    <ul class="list-unstyled">
                                        <?php $total = 0; ?>
                                        @foreach($cart as $cark=>$car)
                                        <?php
                                        $total += Helper::discountedValue($car['total'], $car['product']->discount);
                                        ?>
                                        @endforeach
                                        <li>Card Subtotal x {{count($cart)}} <span class="pull-right">${{Helper::discountedValue($total, 0, true)}}</span></li>
                                        <li>Shipping <span class="pull-right">Free Shipping</span></li>
                                        @if($discountEnabled===true)
                                        <li>Promo Discount <span class="pull-right">{{$discountValue}}%</span></li>
                                        @endif
                                        <li>Order Total <span class="pull-right">${{Helper::discountedValue($total, $discountValue, true)}}</span></li>
                                    </ul>
                                </div>
                                <div class="checkoutFoot">
                                    <div class="web-btn">
                                        <button type="submit" >PLACE ORDER</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
  (() => {
    /*in page css here*/
  })()

  function inquiry_error(res) {
    if (res) {
      if (isJSON(res)) {
        res = JSON.parse(res);
        if (res.errors) {
          var _errors = '';
          for (j in res.errors) {
            _errors += res.errors[j].join('</br>') + '</br>';
          }
          generateNotification('0', _errors);
        }
      }
    }
  }

  function inquiry_success(_msg) {
    if (_msg.status) {
      generateNotification('1', 'Order Placed, Redirecting you to Payment Page');
      $('#inquiry_form')[0].reset();
    }
  }
</script>
@endsection