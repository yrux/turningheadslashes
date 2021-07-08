@extends('layouts.main')
@section('content')
<!-- inn Slide Sec Start -->
@include('extends.banner',['bannerTitle'=>'Faqs'])
<!-- inn Slide Sec End -->

<!-- Freq Ask Question Sec Start -->

<section class="frq-ask">
    <div class="container">
        <div class="freq-ask-title">
            <h3>Frequently asked questions</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>

        <div class="row">

            <div class="col-md-4">
                <div class="freq-sidebar">
                    <h5>Faq Category</h5>
                    <ul>
                        @foreach($categories as $category)
                        <li><a href="{{route('faq')}}#faq_{{$category->id}}">{{$category->flag_value}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-8">

                @foreach($categories as $category)
                    <div id="faq_{{$category->id}}" class="col-md-12 col-xs-12 col-sm-6 faq-main">
                        <h3 class="faq-title">{{$category->flag_value}}</h3>
                        @foreach($category->faqs as $faq)
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="{{$faq->id}}{{$category->id}}">
                                    <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$faq->id}}{{$category->id}}" aria-expanded="false" aria-controls="collapseOne" class="collapsed"> <i class="more-less glyphicon glyphicon-plus"></i> {{$faq->question}} </a> </h4>
                                </div>
                                <div id="collapse{{$faq->id}}{{$category->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="{{$faq->id}}{{$category->id}}" aria-expanded="false">
                                    <div class="panel-body">
                                        <?php print $faq->answer; ?>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    </div>
</section>

<!-- Freq Ask Question Sec End -->
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