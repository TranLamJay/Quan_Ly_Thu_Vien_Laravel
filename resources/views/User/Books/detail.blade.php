<!doctype html>
<html class="no-js" lang="">

<head>
	
</head>
<body class="tg-home tg-homeone">

	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Header Start
		*************************************-->
		@include('User/header')
		<!--************************************
				Header End
		*************************************-->

		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					News Grid Start
			*************************************-->
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div id="tg-twocolumns" class="tg-twocolumns">
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
								<div id="tg-content" class="tg-content">
									<div class="tg-productdetail">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
												<div class="tg-postbook">
													<figure class="tg-featureimg"><img src="{{url('/uploads') }}/{{ $book->image}}" width="300" alt="{{ $book->name }}"></figure>
													<div class="tg-postbookcontent">
														<ul class="tg-delevrystock">
															<li><span>Số lượng: {{ $book->quantity }}</span></li>
															<li><span>Ngôn ngữ: {{ $book->language->type_languages }}</span></li>
															<li><span>Nhà xuất bản: {{ $book->producer->name }}</span></li>
														</ul>
														
														<button class="tg-btn tg-active tg-btn-lg" data-prd="{{ $book->id }}}"><i class="fa fa-shopping-basket"></i>
															Thêm vào giỏ hàng</button>
													</div>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
												<div class="tg-productcontent">
													<ul class="tg-bookscategories">
														<li><a href="javascript:void(0);">{{ $book->category->name }}</a></li>
													</ul>
													<div class="tg-booktitle">
														<h3>{{ $book->name }}</h3>
													</div>
													<span class="tg-bookwriter">By: 
														@for ($i = 0; $i < count($book->authors); $i++)
															{{ $book->authors[$i]->name }}
															@if ($i < count($book->authors) - 1)
																&
															@endif
														@endfor
													</span>
													<div class="tg-description">
														{!! $book->content !!}
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
								<aside id="tg-sidebar" class="tg-sidebar">
									<div class="tg-widget tg-widgetsearch">
										<form class="tg-formtheme tg-formsearch">
											<div class="form-group">
												<button type="button"><i class="icon-magnifier"></i></button>
												<input type="search" class="form-group sidebar_content_search"
                                                placeholder="Search by title, author, key...">
											</div>
										</form>
									</div>
										<div class="tg-widget tg-catagories">
											<div class="panel-title tg-widgettitle">
												<h3>Categories</h3>
											</div>
											<div class="tg-widgetcontent sidebar_content_tg">
												<ul>
													<li>
														<a href="javascript:void(0);" data-type="category"
															data-id="All">
															<span>tất cả</span>
														</a>
													</li>
													@foreach ($categories as $category)
														<li>
															<a href="javascript:void(0);" data-type="category"
																data-id="{{ $category->id }}">
																<span>{{ $category->name }}</span>
															</a>
														</li>
													@endforeach
												</ul>
											</div>
										</div>
									</div>
								</aside>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--************************************
					News Grid End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
		<!--************************************
				Footer Start
		*************************************-->
		@include('User/footer')
		<!--************************************
				Footer End
		*************************************-->
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
	<script src="FE/js/vendor/jquery-library.js"></script>
	<script src="FE/js/vendor/bootstrap.min.js"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
	<script src="FE/js/owl.carousel.min.js"></script>
	<script src="FE/js/jquery.vide.min.js"></script>
	<script src="FE/js/countdown.js"></script>
	<script src="FE/js/jquery-ui.js"></script>
	<script src="FE/js/parallax.js"></script>
	<script src="FE/js/countTo.js"></script>
	<script src="FE/js/appear.js"></script>
	<script src="FE/js/gmap3.js"></script>
	<script src="FE/js/main.js"></script>
    {{-- <script src="FE/js/products.js" type="module"></script> --}}
</body>

</html>