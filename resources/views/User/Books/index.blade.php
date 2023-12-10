<!doctype html>
<html class="no-js" lang="">

	
<head>
	
</head>
<body class="tg-home tg-homeone">
	<div id="user-id-constant" @auth
		data-id="{{ auth()->id() }}"
	@endauth></div>
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
									<div class="tg-products">
										<div class="tg-productgrid">
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
                                    <div class="reset-box">
                                        <button class="reset_btn" style="margin: 12px; padding: 6px 8px">
                                            reset
                                        </button>
                                    </div>
									<div class="panel-group" id="accordion">
										<div class="panel panel-default">
											<div class="panel-heading">
												<a data-toggle="collapse" data-parent="#accordion" href="#menu-category">
													<div class="panel-title tg-widgettitle">
														<h3>Categories</h3>
													</div>
												</a>
											</div>
											<div id="menu-category" class="panel-collapse collapse in">
												<div class="panel-body">
													<div class="tg-widget tg-catagories">
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
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<a data-toggle="collapse" data-parent="#accordion" href="#menu-producer">
													<div class="panel-title tg-widgettitle">
														<h3>
															Producers
														</h3>
													</div>
												</a>
											</div>
											<div id="menu-producer" class="panel-collapse collapse">
												<div class="panel-body">
													<div class="tg-widget">
														<div class="tg-widgetcontent sidebar_content_tg">
															<ul>
																<li>
																	<a href="javascript:void(0);" data-type="producer"
																		data-id="All">
																		<span>tất cả</span>
																	</a>
																</li>
																@foreach ($producers as $producer)
																	<li>
																		<a href="javascript:void(0);" data-type="producer"
																			data-id="{{ $producer->id }}">
																			<span>{{ $producer->name }}</span>
																		</a>
																	</li>
																@endforeach
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<a data-toggle="collapse" data-parent="#accordion" href="#menu-author">
													<div class="panel-title tg-widgettitle">
														<h3>
															Authors
														</h3>
													</div>
												</a>
											</div>
											<div id="menu-author" class="panel-collapse collapse">
												<div class="panel-body">
													<div class="tg-widget">
														<div class="tg-widgetcontent sidebar_content_tg">
															<ul>
																<li>
																	<a href="javascript:void(0);" data-type="author"
																		data-id="All">
																		<span>tất cả</span>
																	</a>
																</li>
																@foreach ($authors as $author)
																	<li>
																		<a href="javascript:void(0);" data-type="author"
																			data-id="{{ $author->id }}">
																			<span>{{ $author->name }}</span>
																		</a>
																	</li>
																@endforeach
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<a data-toggle="collapse" data-parent="#accordion" href="#menu-language">
													<div class="panel-title tg-widgettitle">
														<h3>
															Languages
														</h3>
													</div>
												</a>
											</div>
											<div id="menu-language" class="panel-collapse collapse">
												<div class="panel-body">
													<div class="tg-widget">
														<div class="tg-widgetcontent sidebar_content_tg">
															<ul>
																<li>
																	<a href="javascript:void(0);" data-type="language"
																		data-id="All">
																		<span>tất cả</span>
																	</a>
																</li>
																@foreach ($languages as $language)
																	<li>
																		<a href="javascript:void(0);" data-type="language"
																			data-id="{{ $language->id }}">
																			<span>{{ $language->type_languages }}</span>
																		</a>
																	</li>
																@endforeach
															</ul>
														</div>
													</div>
												</div>
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
		
		<script src="{{ asset('FE/js/products.js') }}" type="module"></script>
		<!--************************************
				Footer End
		*************************************-->
	</div>
	<!--************************************
			Wrapper End
	*************************************-->

</body>

</html>