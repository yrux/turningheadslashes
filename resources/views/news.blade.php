@extends('layouts.main')
@section('content')
<!-- inn Slide Sec Start -->
@include('extends.banner',['bannerTitle'=>$title])
<!-- inn Slide Sec End -->
<section class="news-tmls-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="news-blk-main">
          <h3>News</h3>
          @foreach($news as $new)
          <div class="news-blk">
            <h5>{{$new->title}}</h5>
            <span>{{date('F d, Y',strtotime($new->created_at))}}</span>
            <p class="det_short">{{$new->short_description}}</p>
          </div>
          @endforeach
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
(() => {
/*in page css here*/
})()
</script>
@endsection