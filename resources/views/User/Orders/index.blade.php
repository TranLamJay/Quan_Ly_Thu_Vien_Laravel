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
					Contact Us Start
			*************************************-->
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-contactus">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-sectionhead">
									<h2>Phiếu mượn sách</h2>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<form class="tg-formtheme tg-formcontactus">
									<fieldset>
                                        <input type="hidden" name="user_id"
                                                class="form-control user_id" value="{{ auth()->id() }}"
                                                placeholder="Họ và tên*">
										<div class="form-group">
                                            <label for="user_name">Họ và tên</label>
											<input type="text" name="user_name"
                                                class="form-control user_name" value="{{ auth()->user()->name }}"
                                                placeholder="Họ và tên*">
										</div>
										<div class="form-group">
                                            <label for="user_email">Email</label>
											<input type="text" name="user_email"
                                                class="form-control user_email" value="{{ auth()->user()->email }}"
                                                placeholder="email">
										</div>
										<div class="form-group">
                                            <label>Ngày trả</label>
											<input type="date" class="form-control end_date return_date" readonly>
										</div>
                                        <div class="form-group">
                                            <label for="form">Hình thức</label>
											<select name="form" id="form" class="form-control">
                                                <option>Mượn về</option>
                                                <option>Tại thư viện</option>
                                            </select>
										</div>
                                        <div class="book-box">
											<table class="table">
												<tr>
													<th></th>
													<th>Sản phẩm</th>
													{{-- <th>Số lượng</th> --}}
													<th>Thao tác</th>
												</tr>
												<tbody class="book-box__container">

												</tbody>
											</table>
                                        </div>
										<div class="form-group" style="margin-top: 12px">
											<button type="button" class="tg-btn tg-active btn_order_book">Mượn sách</button>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--************************************
					Contact Us End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
		<!--************************************
				Footer Start
		*************************************-->
		@include('User/footer')
    
    <script src="{{ asset('FE/js/order.js') }}" type="module"></script>
</body>

</html>