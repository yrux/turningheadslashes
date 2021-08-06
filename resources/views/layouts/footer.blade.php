<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="ftr1">
				<?php
              print Helper::dynamicImages(asset('/'), 'images/logo.png', array("data-width" => "158", "data-height" => "150", "alt" => "logo", "class" => ""), 'logo', true);
              ?>
					<ul>
						<li><a target="_blank" href="{{$config['FACEBOOK']}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="{{$config['TWITTER']}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="{{$config['INSTAGRAM']}}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="{{$config['YOUTUBE']}}"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>

			<div class="col-md-5">
				<div class="ftr-form">
				<?php Helper::inlineEditable("h4", "", 'Subscribe', 'FOOTER'); ?>
				<?php Helper::inlineEditable("p", "", 'Join the Our community and keep up to date with exclusive offers, blog content, behind the scenes &amp; more.', 'FOOTER'); ?>
					
					<form method="POST" action="{{route('newsletterSubmit')}}">
						@csrf
						<input type="email" name="email" placeholder="Enter Your Email">
						<button>Send</button>
					</form>
				</div>
			</div>

			<div class="col-md-3">
				<div class="ftr3">
					<ul>
						<li><a href="{{route('faq')}}">FAQ</a></li>
						<li><a href="{{route('parivacypolicy')}}">PRIVACY POLICY</a></li>
						<li><a href="{{route('termsandconditions')}}">TERMS &amp; CONDITIONS</a></li>
						<li><a href="{{route('deliveryandreturns')}}">DELIVERY &amp; RETURNS</a></li>
						<li><a href="">SITEMAP</a></li>
						<li><a href="{{route('contactus')}}">CONTACT US</a></li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</footer>