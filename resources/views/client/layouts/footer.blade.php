<footer id="footer" class="footer-page">
	<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row footer-top">
		<div class="container">
			<div class="wpb_column column_container col-sm-12">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<div class="wrap-item sv-slider   owl-carousel owl-theme" data-item="8" data-speed="5000" data-itemres="0:2,375:3,480:4,640:5,768:6,990:7,1200:8" data-animation="" data-navigation="" data-pagination="" data-prev="" data-next="" style="opacity: 1; display: block;">
							<div class="owl-wrapper-outer">
								<div class="owl-wrapper" style="width: 2336px; left: 0px; display: block; transition: all 1000ms ease 0s; transform: translate3d(0px, 0px, 0px);">
									@foreach($dog_ft as $dogs)
									<div class="owl-item active" style="width: 146px;">
										<div class="item-adv-footer  ">
											<a href="{{ route('home.detail_dog',$dogs->id)}}" class="wobble-horizontal">
 												@php
					                                $photos = $dogs->getImage($dogs->id);
					                            @endphp
					                                @if($photos != null)
												<img width="150" height="185" src="{{ asset('upload/dogs/' . $photos[0]) }}" class="attachment-full size-full" alt="">
												@endif
											</a>
											<div class="info-adv-footer">
												<h3 class="title18">{{$dogs->name}}</h3>
												<p class="desc">{{$dogs->dogcategory->name}}</p>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="vc_row-full-width vc_clearfix"></div>
		<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row main-footer vc_custom_1516171227797 vc_row-has-fill">
			<div class="wpb_column column_container col-sm-6 col-md-3">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<div class="custom-information  ">
							<div class="footer-box">
								<h2 class="title-footer title18 dosis-font text-uppercase font-bold white">Dog Categories</h2>
								<ul class="list-none list-menu-footer">
									@foreach($dogCategories as $dogcat)
									<li><a class="white" href="{{route('home.dog',$dogcat->id) }}">{{$dogcat->name}}</a></li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="wpb_column column_container col-sm-6 col-md-3">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<div class="custom-information  ">
							<div class="footer-box">
								<h2 class="title-footer title18 dosis-font text-uppercase font-bold white">Product Categories</h2>
								<ul class="list-none list-menu-footer">
									  
									  @foreach($productCategories as $dogcat)
									<li><a class="white" href="{{route('home.product',$dogcat->id) }}">{{$dogcat->name}}</a></li>
									@endforeach
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="wpb_column column_container col-sm-6 col-md-3">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<div class="custom-information  ">
							<div class="footer-box">
								<h2 class="title-footer title18 dosis-font text-uppercase font-bold white">Contact</h2>
								<div class="contact-footer">
									<p class="desc white"><i class="icon ion-map"></i>45 Võ Chí Công</p>
									<p class="desc white"><i class="icon ion-ios-telephone"></i>Mobile: <b>0971006294</b>
									<br /> Tel: <b>0351 365 765</b></p>
									<p class="desc white"><i class="icon ion-ios-email"></i><a class="white" href="mailto:contact.7uptheme@gmail.com">contact.7uptheme@gmail.com</a>
									<br />
									<a class="white" href="mailto:thanphamngoc@gmail.com">thanphamngoc@gmail.com</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="wpb_column column_container col-sm-12 col-md-3">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<div class="logo logo-text">
							<div class="text-logo">
								<a href="http://7uptheme.com/wordpress/haustiere">
									<ul class="list-inline-block">
										<li><img class="alignnone size-full wp-image-870" src="asset/uploads/2018/01/logo-2.png" alt="" width="51" height="46"></li>
										<li>
											<h1 class="title30 dosis-font text-uppercase font-bold white">Haustiere</h1>
											<h2 class="title24 gab-font white opaci">we sell real friends</h2>
										</li>
									</ul>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="custom-information  ">
					<h2 class="title-footer title18 dosis-font text-uppercase font-bold white">Follow Us</h2>
				</div>
				<div class="link-profile  ">
					<a class="color hover-shadow" href="#"><i class="icon ion-social-facebook"></i></a>
					<a class="color hover-shadow" href="#"><i class="icon ion-social-googleplus"></i></a>
					<a class="color hover-shadow" href="#"><i class="icon ion-social-twitter"></i></a>
					<a class="color hover-shadow" href="#"><i class="icon ion-social-vimeo"></i></a>
				</div>
			</div>
		</div>
		<div class="vc_row-full-width vc_clearfix"></div>
	</div>
	<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row footer-bottom footer-bottom2 vc_custom_1516171781582 vc_row-has-fill">
		<div class="container">
			<div class="wpb_column column_container col-sm-8">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<div class="custom-information  ">
							<div class="table-custom copy-right-footer">
								<div class="logo">
									<a href="../index.html"><img class="alignnone size-full wp-image-870" src="asset/uploads/2018/01/logo-2.png" alt="" width="51" height="46" /></a>
								</div>
								<div class="policy-footer">
									<ul class="list-inline-block menu-footer">
										<li><a class="white" href="#">Privacy Policy</a></li>
										<li><a class="white" href="#">Terms &amp; Conditions</a></li>
										<li><a class="white" href="#">Cookies</a></li>
										<li><a class="white" href="../bog.html">Blog</a></li>
										<li><a class="white" href="../about/index.html">About</a></li>
										<li><a class="white" href="../contact/index.html">Contact</a></li>
										<li><a class="white" href="#">Site Map</a></li>
									</ul>
									<p class="desc copyright white">@2018 - Design by: <a class="white" href="http://7uptheme.com/">7uptheme.com</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="wpb_column column_container col-sm-4">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<div class="payment-method text-right">
							<ul class="list-inline-block">
								<li>
									<a class="wobble-top" href="#"><img width="36" height="22" src="asset/uploads/2018/01/pay1.jpg" class="attachment-full size-full" alt="" /></a>
								</li>
								<li>
									<a class="wobble-top" href="#"><img width="49" height="22" src="asset/uploads/2018/01/pay2.jpg" class="attachment-full size-full" alt="" /></a>
								</li>
								<li>
									<a class="wobble-top" href="#"><img width="37" height="22" src="asset/uploads/2018/01/pay3.jpg" class="attachment-full size-full" alt="" /></a>
								</li>
								<li>
									<a class="wobble-top" href="#"><img width="36" height="22" src="asset/uploads/2018/01/pay4.jpg" class="attachment-full size-full" alt="" /></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>