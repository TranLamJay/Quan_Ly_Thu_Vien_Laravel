@extends('Admin.main')

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
        {!! \App\Helpers\Helper::category($categories) !!}
          </tr>
          
      </tbody>
    </table>
  </div>
  {{ $categories->links()}}
@endsection