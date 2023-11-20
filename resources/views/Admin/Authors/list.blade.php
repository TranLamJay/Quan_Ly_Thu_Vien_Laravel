@extends('admin.main')

@section('content')
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên Loại</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Tran Lam</td>
        {{-- {!! \App\Helpers\Helper::category($categories) !!} --}}
          </tr>
      </tbody>
    </table>
  </div>
@endsection