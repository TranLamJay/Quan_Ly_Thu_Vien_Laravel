@extends('Admin.main')

@section('content')
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên Nhà Xuất Bản</th>
          <th>Địa Chỉ</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($producers as $key => $producer)
        <tr>
            <td>{{ $producer->id }}</td>
            <td>{{ $producer->name }}</td>
            <td>{!! $producer->address !!}</td>
            <td>
              <a href="/admin/producers/edit/{{  $producer->id  }}" name = "edit" value = "edit" class="btn btn-success">
                <b class="mdi mdi-upload btn-icon-prepend">Sửa</b></a>

                <a onclick="removeRow(id = {{ $producer->id }}, url='/admin/producers/destroy')" href="" name = "delete" value = "delete" class="btn btn-danger">
                  <b class="mdi mdi-alert btn-icon-prepend">Xóa</b></a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  {{ $producers->links()}}
@endsection