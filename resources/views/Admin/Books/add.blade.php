@extends('Admin.main')

@section('head')
<script src="//cdn.ckeditor.com/4.23.0-lts/standard/ckeditor.js"></script>
@endsection

@section('content')
<form class="pt-3" id='themsach' method="POST" action="" enctype="multipart/form-data">
    <div class='form-group'>
        <label for='name'>Tên Sách</label>
        <input type='text' name='name' class='form-control' value="{{ old('name') }}" id='name' placeholder='Tên Sách'>
    </div>
    <div class='form-group'>
        <label for='quantity'>Số Lượng</label>
        <input type="number" name="quantity" class="form-control input-number" id='quantity' value="{{ old('quantity') }}" min="1" max="999">
    </div>
    <div class='form-group'>
        <label for='author'>Tên Tác Giả Chính</label>
        <input type='text' name='author' class='form-control' id='author' value="{{ old('author') }}">
    </div>
    {{-- <div class='form-group'>
      <label for='author_phu'>Tên Tác Giả Phụ</label>
      <input type='text' name='author_phu' class='form-control' id='author_phu' value="--{{ old('author_phu') }}">
    </div> --}}
    <div class='form-group'>
        <label for='content'>Nội Dung</label>
        <textarea class="form-control" name='content' id="content" value="{{ old('content') }}" placeholder='Nội Dung'></textarea>
    </div>
    <div class="form-group">
        <label for='file_upload'>Upload Hình</label>
        <input type="file" name='file_upload' class="form-control"  value="{{ old('file_upload') }}">
    </div>
    <div class="form-group">
        <label for='publishing_year'>Năm Sản Xuất</label>
        <input type="date" name='publishing_year' class="form-control" id='publishing_year' value="{{ old('publishing_year') }}">
    </div>
    <div class="form-group">
        <label for="category_id">Loại Sách</label>
          <select class="form-control" id="category_id" name="category_id" value="{{ old('category_id') }}">

            @foreach ($category_id as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
    </div>
    <div class="form-group">
        <label for="producer_id">Nhà Sản Xuất</label>
          <select class="form-control" id="producer_id" name="producer_id" value="{{ old('producer_id') }}">

            @foreach ($producer_id as $producer)
            <option value="{{ $producer->id }}">{{ $producer->name }}_{{ $producer->address }}</option>
            @endforeach
          </select>
    </div>
    <div class="form-group">
        <label for="language_id">Ngôn Ngữ</label>
          <select class="form-control" id="language_id" name="language_id" value="{{ old('language_id') }}">

            @foreach ($language_id as $language)
            <option value="{{ $language->id }}">{{ $language->type_languages }}</option>
            @endforeach
          </select>
    </div>
    <button type='submit' class='btn btn-primary mr-2'>Save</button>
    <a href='/admin/books/list' type='submit' class='btn btn-light'>Cancel</a>
    
    @csrf
    {{-- @method('POST') --}}

</form>
@endsection

@section('footer')

<script>
  ClassicEditor
          .create( document.querySelector( '#content' ) )
          .then( editor => {
                  console.log( editor );
          } )
          .catch( error => {
                  console.error( error );
          } );
</script>
@endsection