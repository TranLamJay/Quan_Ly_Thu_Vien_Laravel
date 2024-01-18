@extends('Admin.main')

@section('head')
<script src="//cdn.ckeditor.com/4.23.0-lts/standard/ckeditor.js"></script>
@endsection

@section('content')
<form class="pt-3" method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
    <div class="form-group">
        <label for="user_id">Tên Độc Giả</label>
          <select class="form-control" id="user_id" name="user_id">
                @foreach ($user_id as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
          </select>
    </div class="form-group">
        <label for='reason'>Lý do vi phạm</label>
        <textarea  name='reason' class='form-control' id='reason' placeholder='Lý do vi phạm'></textarea>
    </div>
    <div class ='form-group'>
        <label for='form'>Hình thức xử lý</label>
        <input  type='text' name='form' class='form-control' id='form' placeholder='Hình thức xử lý'>
    </div>
    <div class='form-group'>
        <label for='date_violation'>Ngày xử lý vi phạm</label>
        <input  type='date' name='date_violation' class='form-control' id='date_violation' placeholder='yyyy/mm/dd'>
    </div>
    
    <button type='submit' class='btn btn-primary mr-2'>Save</button>
    <a href='/admin/violations/list' type='submit' class='btn btn-light'>Cancel</a>

    @csrf
</div>
</form>
@endsection

@section('footer')

<script>
  ClassicEditor
          .create( document.querySelector( '#reason' ) )
          .then( editor => {
                  console.log( editor );
          } )
          .catch( error => {
                  console.error( error );
          } );
</script>
@endsection