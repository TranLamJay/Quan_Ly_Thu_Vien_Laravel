@extends('Admin.main')

@section('content')
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Loại Ngôn Ngữ</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($languages as $key => $language)
        <tr>
            <td>{{ $language->id }}</td>
            <td>{{ $language->type_languages }}</td>
            <td>
              <a href="/admin/languages/edit/{{  $language->id  }}" name = "edit" value = "edit" class="btn btn-success">
                <b class="mdi mdi-upload btn-icon-prepend">Sửa</b></a>

                <a onclick="removeRow(id = {{ $language->id }}, url='/admin/languages/destroy')" href="" name = "delete" value = "delete" class="btn btn-danger">
                  <b class="mdi mdi-alert btn-icon-prepend">Xóa</b></a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  {{ $languages->links()}}
@endsection