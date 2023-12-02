@extends('Admin.main')

@section('content')
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên Tác Giả</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($authors as $key => $author)
        <tr>
            <td>{{ $author->id }}</td>
            <td>{{ $author->name }}</td>
            <td>
                <a href="/admin/menus/edit/'. $category->id .'" name = "edit" value = "edit" class="btn btn-success">
                <b class="mdi mdi-upload btn-icon-prepend">Sửa</b></a>

                <a href="/admin/menus/destroy" onclick="removeRow('. $category->id .', \'/admin/menus/destroy\')" name = "delete" value = "delete" class="btn btn-danger">
                <b class="mdi mdi-alert btn-icon-prepend">Xóa</b></a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection