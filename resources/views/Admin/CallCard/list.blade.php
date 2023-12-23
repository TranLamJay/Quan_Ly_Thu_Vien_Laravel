@extends('Admin.main')

@section('content')
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
                <a href="/admin/callCards/list/detail/{{  $callCard->id  }}" name = "detail" value = "detail"class=" btn btn-info btn-icon-text">
                    <b class="#">Chi tiết</b></a>
                <a href="/admin/callCards/edit/{{  $callCard->id  }}" name = "edit" value = "edit" class="btn btn-success">
                <b class="mdi mdi-upload btn-icon-prepend">Sửa</b></a>

                <a href="/admin/callCards/destroy" onclick="removeRow('. $callCard->id .', \'/admin/callCards/destroy\')" name = "delete" value = "delete" class="btn btn-danger">
                <b class="mdi mdi-alert btn-icon-prepend">Xóa</b></a>
            </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>
  {{-- {{ $callCards->links() }} --}}
@endsection