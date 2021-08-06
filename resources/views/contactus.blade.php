@extends('layouts.main')
@section('content')
<!-- inn Slide Sec Start -->
@include('extends.banner',['bannerTitle'=>'Contact'])
<!-- inn Slide Sec End -->


<section class="contact-sec padding-80">
  <div class="shap-imgtwo"></div>
  <div class="container">
    <div class="contact-img">
      <div class="latst-head">
        <h5>Get In Touch</h5>
      </div>
      <div class="row">
        <div class="contact-main">
          <div class="col-md-8 col-sm-8">
            <div class="contact-form-inner">
              <div class="row">
                <form class="CrudForm" id="inquiry_form" data-noinfo="true" data-customcallback="inquiry_success" data-customcallbackFail="inquiry_error" method="POST" action="{{route('contactusSubmit')}}">
                  @csrf
                  <div class="col-md-6">
                    <div class="name form-group">
                      <input placeholder="Your First name" name="inquiries_name" value="{{old('inquiries_name')}}" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="name form-group">
                      <input placeholder="Your Last name" name="inquiries_lname" value="{{old('inquiries_lname')}}" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="phone form-group">
                      <input placeholder="Your Email Address" name="inquiries_email" value="{{old('inquiries_email')}}" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="details form-group">
                      <textarea placeholder="Comment" name="extra_content" class="form-control" rows="8">{{old('extra_content')}}</textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="buton">Send Message</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="cntct-list">
              <div class="row">
                <div class="contact-info">
                  <div class="col-md-3">
                    <div class="cicle-icon"><img alt="" class="img-responsive" src="{{asset('images/locicn.png')}}"></div>
                  </div>
                  <div class="col-md-9">
                    <div class="contact_text">
                      <h2>Mailing Address:</h2>
                      <p>{{$config['ADDRESS']}}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="contact-info">
                  <div class="col-md-3">
                    <div class="cicle-icon"><img alt="" class="img-responsive" src="{{asset('images/calicn.png')}}"></div>
                  </div>
                  <div class="col-md-9">
                    <div class="contact_text">
                      <h2>Phone</h2>
                      <p><a class="email-text" href="tel:{{$config['COMPANYPHONE']}}">{{$config['COMPANYPHONE']}}</a></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="contact-info">
                  <div class="col-md-3">
                    <div class="cicle-icon"><img alt="" class="img-responsive" src="{{asset('images/emlicn.png')}}"></div>
                  </div>
                  <div class="col-md-9">
                    <div class="contact_text">
                      <h2>Email At</h2>
                      <p><a class="email-text" href="mailto:{{$config['COMPANYEMAIL']}}">{{$config['COMPANYEMAIL']}}</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="shap-img"></div>
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
      generateNotification('1', 'Thank you! your message has been sent to admin.');
      $('#inquiry_form')[0].reset();
    }
  }
</script>
@endsection