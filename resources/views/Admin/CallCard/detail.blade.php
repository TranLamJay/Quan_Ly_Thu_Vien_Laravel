@extends('Admin.main')

@section('content')
<div class="users mt-3" >
    @foreach($users as $key => $user)
    <ul>
        <li>Tên độc giả: <strong>{{ $user->name }}</strong></li>
        <li>Email: <strong>{{ $user->email }}</strong></li>
        <li>Ngày sinh: <strong>{{ $user->date_birth }}</strong></li>
        <li>Giới tính: <strong>{{ $user->sex }}</strong></li>
        <li>Địa chỉ: <strong>{{ $user->address }}</strong></li>
        <li>CCCD: <strong>{{ $user->CCCD }}</strong></li>
    </ul>
    @endforeach
</div>
<div class="callCards details" >
    <table class="table">
        <thead>
          <tr>
            <th>Hình ảnh</th>
            <th>Tên sách</th>
            <th>Ngày mượn</th>
            <th>Ngày trả</th>
            <th>Trạng thái</th>
            <th>Hình thức mượn</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($callCards as $key => $callCard)
          <tr>
            <td>{{ $callCard->book->name ?? 'None'}}</td>
            <td>{{ $callCard->book->name ?? 'None'}}</td>
            <td>{{ $callCard->borrowing_date }}</td>
            <td>{{ $callCard->return_date }}</td>
            <td>{{ $callCard->status }}</td>
            <td>{{ $callCard->form }}</td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
</div>
@endsection
