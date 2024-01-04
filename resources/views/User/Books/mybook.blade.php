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
			@if (session('status'))
				<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					{{ session('status') }}
				</div>
				@php
					session()->forget('status')
				@endphp
			@endif
			<!--************************************
					News Grid Start
			*************************************-->
			<div style="margin-top: 36px">
				
				<table class="table">
					<thead>
					<tr>
						<th>ID</th>
						<th>Sách đã mượn</th>
						<th>Ngày mượn</th>
						<th>Ngày trả</th>
						<th>Trạng thái</th>
						<th>Hình thức mượn</th>
						<th> </th>
					</tr>
					</thead>
					<tbody>
					@foreach ($callCards as $key => $callCard)
					<tr class="call-card-item">
						<td>{{ $callCard->id }}</td>
						<td>
							@foreach ( $callCard->books as $book)
								<div style="display: flex; margin-top: 12px">
									<div class="image" style="margin-right: 24px"><img style="width: 80px; height: 80px; object-fit: cover"
										src="{{ asset('uploads/' . $book->image) }}" alt=""></div>
									<p>{{ $book->name }}</p>
								</div>
							@endforeach
						</td>
						<td>{{ $callCard->borrowing_date }}</td>
						<td class="return_date">{{ $callCard->return_date }}</td>
						@if ($callCard->status==0)
						<td class="status" data-status="{{ $callCard->status }}">Chờ xác nhận</td>
						@elseif($callCard->status==1)
						<td class="status" data-status="{{ $callCard->status }}">Đang mượn</td>
						@elseif($callCard->status==-1)
						<td class="status" data-status="{{ $callCard->status }}">Đã hủy</td>
						@else
						<td class="status" data-status="{{ $callCard->status }}">Đã trả</td>
						@endif

						{{-- <td class="status" data-status="{{ $callCard->status }}">{{ $callCard->status }}</td> --}}
						<td>{{ $callCard->form }}</td>
						<td>
							<a href="{{ route('requestExtend', ['id'=> $callCard->id]) }}"
								class="btn btn-warning extend" data-extend="{{ $callCard->extend }}">
								Gia hạn
							</a>
						</td>
					</tr>
					@endforeach
					
					</tbody>
				</table>
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
	<script src="{{ asset('FE/js/mybook.js') }}"></script>
</body>

</html>