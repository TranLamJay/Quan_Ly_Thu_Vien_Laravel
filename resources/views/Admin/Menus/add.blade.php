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
        <label for='name'>Tên Thể Loại</label>
        <input  type='text' name='name' class='form-control' id='name' placeholder='Tên Thể Loại'>
    </div>
    {{-- <div class="form-group">
        <label for="exampleSelectVaiTro">Danh Mục Cha</label>
          <select class="form-control" id="exampleSelectVaiTro" name="parent_id">

            @foreach ($parent_id as $parent)
            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
            @endforeach
          </select>
    </div> --}}
    {{-- <div class='form-group'>
        <label for='parent_name'>Thể Loại</label>
        <input  type='text' name='parent_name' class='form-control' id='parent_name' placeholder='Thể Loại'>
    </div> --}}
    {{-- <label class="col-sm-3 col-form-label">Active</label>
    <div class="form-group row">
        <div class="col-sm-4">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="active" id="active" value="0" checked>
              Hoạt động
            </label>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="active" id="active" value="1">
              Không hoạt động
            </label>
          </div>
        </div>
      </div> --}}
    
    <button type='submit' class='btn btn-primary mr-2'>Save</button>
    <a href='/admin/menus/list' type='submit' class='btn btn-light'>Cancel</a>

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