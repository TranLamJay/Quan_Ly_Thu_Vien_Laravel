@extends('Admin.main')

@section('head')
<script src="//cdn.ckeditor.com/4.23.0-lts/standard/ckeditor.js"></script>
@endsection

@section('content')
<form class="pt-3" method="POST" action="" enctype="multipart/form-data">
    <div class='form-group'>
        <label for='return_date'>Ngày Trả</label>
        <input  type='date' name='return_date' class='form-control' id='return_date' value="{{ $callCards->return_date }}">
    </div>
    <div class="form-group">
        <label for="status">Trạng Thái</label>
          <select class="form-control" id="status" name="status">
            @if($callCards->status==0)
            <option value="0">Đang mượn</option>
            <option value="1">Đã trả</option>
            @else
            <option value="1">Đã trả</option>
            <option value="0">Đang mượn</option>
            @endif
          </select>
    </div>
    {{-- <div class='form-group'>
        <label for='form'>Hình thức mượn</label>
        <input type='text' name='form' class='form-control' value="{{ $callCards->form }}" id='form'>
    </div> --}}
    
    <button type='submit' class='btn btn-primary mr-2'>Update</button>
    <a href='/admin/callCards/list' type='submit' class='btn btn-light'>Cancel</a>

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