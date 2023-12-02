@extends('Admin.main')

@section('content')
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên Người Dùng</th>
          <th>Email</th>
          <th>Hình</th>
          <th>Ngày Sinh</th>
          <th>Giới Tính</th>
          <th>Địa Chỉ</th>
          <th>CCCD</th>
          <th>Trạng thái</th>
          <th>Vai Trò</th>
          <th>Edit </th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <td>{$nhanvien['id']}</td>
        <td>{$nhanvien['ten_nv']}</td>
        <td>{$nhanvien['ngay_sinh']}</td>
        <td>{$nhanvien['gioi_tinh']}</td>
        <td>{$nhanvien['dia_chi']}</td>
        <td>{$nhanvien['email']}</td>
        <td>{$nhanvien['cccd']}</td>
        <td>{$nhanvien['cccd']}</td>
        <td>
          <label class="toggle-switch toggle-switch-success">
          <input type="checkbox" checked>
          <span class="toggle-slider round"></span>
          </label>   
        </td>
        <td>{$nhanvien['vaitro']}</td>
        <td>
          
          <form method = 'POST' action = 'admin.add'>
            <button name = 'edit' value = 'update' class='btn btn-success'><b class='mdi mdi-upload btn-icon-prepend'>Sửa</b></button>
            <button name = 'delete' value = 'delete' class='btn btn-danger'><b class='mdi mdi-alert btn-icon-prepend'>Xóa</b></button>
          </form>
        </td>
          </tr>
      </tbody>
    </table>
  </div>
@endsection