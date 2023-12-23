@extends('Admin.main')

@section('content')
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên Sách</th>
          <th>Số Lượng</th>
          <th>Ngày Nhập</th>
          {{-- <th>Nội Dung</th> --}}
          <th>Hình Ảnh</th>
          <th>Năm Sản Xuất</th>
          <th>Loại Sách</th>
          <th>Nhà Sản Xuất</th>
          <th>Ngôn Ngữ</th>
          <th> </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($books as $key => $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->name }}</td>
            <td>{{ $book->quantity }}</td>
            <td>{{ $book->date_add }}</td>
            {{-- <td>{!! $book->content !!}</td> --}}
            <td><img src="{{ url('/uploads') }}/{{ $book->image }}" width="50" alt=""></td>
            <td>{{ $book->publishing_year }}</td>
            <td>{{ $book->category->name }}</td>
            <td>{!! $book->producer->name !!}__{!! $book->producer->address !!}</td>
            <td>{{ $book->language->type_languages }}</td>
            <td>
                <a href="/admin/books/edit/{{  $book->id  }}" name = "edit" value = "edit" class="btn btn-success">
                <b class="mdi mdi-upload btn-icon-prepend">Sửa</b></a>

                <a href="/admin/books/destroy" onclick="removeRow('. $book->id .', \'/admin/books/destroy\')" name = "delete" value = "delete" class="btn btn-danger">
                <b class="mdi mdi-alert btn-icon-prepend">Xóa</b></a>
            </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>
  {{ $books->links() }}
@endsection
