@extends('Admin.main')

@section('head')
<script src="//cdn.ckeditor.com/4.23.0-lts/standard/ckeditor.js"></script>
@endsection

@section('content')
<form class="pt-3" method="POST" action="">
    <div class ='form-group'>
        <label for='name'>Tên Nhà Xuất Bản</label>
        <input  type='text' name='name' class='form-control' id='name' value="{{ $producers->name }}">
    </div>
    <div class='form-group'>
        <label for='address'>Địa Chỉ</label>
        <textarea name='address' class='form-control' id='address'>{!! $producers->address !!}</textarea>
    </div>
    
    <button type='submit' class='btn btn-primary mr-2'>Update</button>
    <a href='/admin/producers/list' type='submit' class='btn btn-light'>Cancel</a>

    @csrf
    
</form>
@endsection

@section('footer')

<script>
  ClassicEditor
          .create( document.querySelector( '#address' ) )
          .then( editor => {
                  console.log( editor );
          } )
          .catch( error => {
                  console.error( error );
          } );
</script>
@endsection