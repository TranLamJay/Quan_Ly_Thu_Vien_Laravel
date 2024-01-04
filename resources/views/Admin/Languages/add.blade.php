@extends('Admin.main')

@section('head')
<script src="//cdn.ckeditor.com/4.23.0-lts/standard/ckeditor.js"></script>
@endsection

@section('content')
<form class="pt-3" method="POST" action="">
    <div class ='form-group'>
        <label for='id'>Id</label>
        <input  type='text' name='id' class='form-control' id='id' placeholder='Id'>
    </div>
    <div class='form-group'>
        <label for='type_languages'>Loại Ngôn Ngữ</label>
        <input  type='text' name='type_languages' class='form-control' id='type_languages' placeholder='Loại Ngôn Ngữ'>
    </div>
    
    <button type='submit' class='btn btn-primary mr-2'>Save</button>
    <a href='/admin/languages/list' type='submit' class='btn btn-light'>Cancel</a>

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