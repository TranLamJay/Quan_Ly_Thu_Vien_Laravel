@extends('Admin.main')

@section('content')
<form action="" class="form-inline">
  <div class="form-group">
    <input class="form-control" name="key" placeholder="Search by Name: " style="width: 300px;">
  </div>

  <button type='submit' class='btn btn-primary mr-2' style="width: 60px; height: 45px; margin-left: 5px;">
    <i class="fas fa-search">
      Tìm
    </i>
  </button>

</form>
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Tên Người Dùng</th>
          <th>Email</th>
          <th>Hình</th>
          <th>Ngày Sinh</th>
          <th>Giới Tính</th>
          <th>Địa Chỉ</th>
          <th>CCCD</th>
          <th>Trạng thái</th>
          <th>Vai Trò</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $key=>$user)
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td><img src="{{ url('/uploads/users') }}/{{ $user->image }}" width="50" alt=""></td>
          <td>{{ $user->date_birth }}</td>
          <td>{{ $user->sex==0? 'Nữ' : 'Nam' }}</td>
          <td>{!! $user->address !!}</td>
          <td>{{ $user->CCCD }}</td>
        <td>
          <label class="toggle-switch toggle-switch-success">
            @if($user->active==1)
              <input type="checkbox" checked>
            @else
            @endif
          <span class="toggle-slider round"></span>
          </label>   
        </td>
        <td>{{ $user->role->name }}</td>
        <td>
          <a href="/admin/users/edit/{{  $user->id  }}" name = "edit" value = "edit" class="btn btn-success">
            <b class="mdi mdi-upload btn-icon-prepend">Sửa</b></a>
              @csrf
              @method('GET')
            <a onclick="removeRow(id = {{ $user->id }}, url='/admin/users/destroy')" href="" name = "delete" value = "delete" class="btn btn-danger">
            <b class="mdi mdi-alert btn-icon-prepend">Xóa</b></a>
        </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
  {{ $users->appends(request()->all())->links() }}
@endsection