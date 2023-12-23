@extends('Admin.main')

@section('content')
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Tên Người Dùng</th>
          <th>Email</th>
          <th>Hình</th>
          <th>Ngày Sinh</th>
          <th>Giới Tính</th>
          {{-- <th>Địa Chỉ</th> --}}
          <th>CCCD</th>
          <th>Trạng thái</th>
          <th>Vai Trò</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <td>User</td>
        <td>user@gmail.com</td>
        <td></td>
        <td>01-01-2001</td>
        <td>Nữ</td>
        <td>121212112</td>
        <td>
          <label class="toggle-switch toggle-switch-success">
          <input type="checkbox" checked>
          <span class="toggle-slider round"></span>
          </label>   
        </td>
        <td>Độc giả</td>
        <td>
          
          <form method = 'POST' action = 'admin.add'>
            <button name = 'edit' value = 'update' class='btn btn-success'><b class='mdi mdi-reload btn-icon-prepend'>Sửa</b></button>
            <button name = 'delete' value = 'delete' class='btn btn-danger'><b class='mdi mdi-alert btn-icon-prepend'>Xóa</b></button>
          </form>
        </td>
          </tr>
      </tbody>
    </table>
  </div>
@endsection