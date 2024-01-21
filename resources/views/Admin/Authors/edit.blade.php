@extends('Admin.main')

@section('head')
<script src="//cdn.ckeditor.com/4.23.0-lts/standard/ckeditor.js"></script>
@endsection

@section('content')
<form class="pt-3" method="POST" action="">
    <div class='form-group'>
        <label for='name'>Tên Tác Giả</label>
        <input  type='text' name='name' class='form-control' id='name' value="{{ $authors->name }}">
    </div>
    {{-- <div class='form-group'>
        <label for='roles'>Vai Trò</label>
        <input  type='text' name='roles' class='form-control' id='roles' placeholder='Vai Trò'>
    </div>
    <div class='form-group'>
        <label for='name_book'>Tên Sách</label>
        <input  type='text' name='name_book' class='form-control' Tên='name_book' placeholder='Tên Sách'>
    </div> --}}
    <button type='submit' class='btn btn-primary mr-2'>Update</button>
    <a href='/admin/author/list' type='submit' class='btn btn-light'>Cancel</a>

    @csrf
    
</form>
@endsection

@section('footer')

<script>
  ClassicEditor
          .create( document.querySelector( '#dia_chi' ) )
          .then( editor => {
                  console.log( editor );
          } )
          .catch( error => {
                  console.error( error );
          } );
</script>
@endsection