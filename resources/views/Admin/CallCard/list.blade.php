@extends('Admin.main')

@section('content')
@if (session('status'))
				<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					{{ session('status') }}
				</div>
				@php
					session()->forget('status')
				@endphp
			@endif
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Ngày mượn</th>
          <th>Ngày trả</th>
          <th>Trạng thái</th>
          <th>Hình thức mượn</th>
          <th>UserName</th>
          <th>UserEmail</th>
          <th> </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($callCards as $key => $callCard)
        <tr>
            <td>{{ $callCard->id }}</td>
            <td>{{ $callCard->borrowing_date }}</td>
            <td>{{ $callCard->return_date }}</td>
            <td>{{ $callCard->status }}</td>
            <td>{{ $callCard->form }}</td>
            <td>{{ $callCard->user_name }}</td>
            <td>{{ $callCard->user_email }}</td>
            <td>
                <a href="/admin/callCards/list/detail/{{  $callCard->id  }}" name = "detail" value = "detail" class="btn btn-success">
                    <b class="fas fa-eye btn-icon-prepend">Chi tiết</b></a>
                
                @if ($callCard->extend !== 0)
                  <select class="form-control select-extend" data-id="{{ $callCard->id }}">
                    <option value="1">Chờ gia hạn</option>
                    <option value="2">Cho phép gia hạn</option>
                    <option value="-1" @if ($callCard->extend === -1)
                        selected
                    @endif>Không Cho phép gia hạn</option>
                  </select>
                @endif
                <a href="/admin/callCards/destroy" onclick="removeRow('. $callCard->id .', \'/admin/callCards/destroy\')" name = "delete" value = "delete" class="btn btn-danger">
                <b class="mdi mdi-alert btn-icon-prepend">Xóa</b></a>
            </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>
  <script src="{{ asset('FE/js/callcardAdmin.js') }}"></script>
  {{-- {{ $callCards->links() }} --}}
@endsection
