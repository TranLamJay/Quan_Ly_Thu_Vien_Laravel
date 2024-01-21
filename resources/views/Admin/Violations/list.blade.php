@extends('Admin.main')

@section('content')
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên Độc Giả</th>
          <th>Lý do vi phạm</th>
          <th>Hình thức xử lý</th>
          <th>Ngày xử lý vi phạm</th>
        </tr>
      </thead>
      <tbody>
        @foreach($violations as $key=>$violation)
        <tr>
          <td>{{ $violation->id }}</td>
          <td>{{ $violation->user->name }}</td>
          <td>{!! $violation->reason !!}</td>
          <td>{{ $violation->form }}</td>
          <td>{{ $violation->date_violation }}</td>
        <td>
          <a href="/admin/violations/edit/{{  $violation->id  }}" name = "edit" value = "edit" class="btn btn-success">
            <b class="mdi mdi-upload btn-icon-prepend">Sửa</b></a>
              @csrf
              @method('GET')
            <a onclick="removeRow(id = {{ $violation->id }}, url='/admin/violations/destroy')" href="" name = "delete" value = "delete" class="btn btn-danger">
            <b class="mdi mdi-alert btn-icon-prepend">Xóa</b></a>
        </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
  {{ $violations->links()}}
@endsection