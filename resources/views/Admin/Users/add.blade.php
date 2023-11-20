@extends('Admin.main')

@section('head')
<script src="//cdn.ckeditor.com/4.23.0-lts/standard/ckeditor.js"></script>
@endsection

@section('content')
<form class="pt-3" method="POST" action="">
    <div class='form-group'>
        <label for='name'>Tên Người Dùng</label>
        <input  type='text' name='name' class='form-control' id='name' placeholder='Tên Người Dùng'>
    </div>
    <div class ='form-group'>
        <label for='email'>Email</label>
        <input  type='email' name='email' class='form-control' id='email' placeholder='Email'>
    </div>
    <div class='form-group'>
        <label for='password'>Password</label>
        <input  type='password' name='password' class='form-control' id='password' placeholder='Password'>
    </div>
    <div class="form-group">
        <label>Hình Ảnh</label>
        <div class="input-group col-xs-12">
          <input type="text" name="img" id="img" class="form-control file-upload-info" disabled placeholder="Upload Image">
          <span class="input-group-append">
            <button type="submit" class="file-upload-browse btn btn-primary">Upload</button>
          </span>
        </div>
      </div>
    <div class='form-group'>
        <label for='exampleInputNgaySinh'>Ngày Sinh</label>
        <input  type='date' name='ngay_sinh' class='form-control' id='exampleInputNgaySinh' placeholder='yyyy/mm/dd'>
    </div>
    <label class="col-sm-3 col-form-label">Giới Tính</label>
    <div class="form-group row">
        <div class="col-sm-4">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="gioi_tinh" id="membershipGioiTinh" value="1" 
              {{-- {{ $user->gioi_tinh==1?'checked=""':'' }}--}}>Nam</label> 
          </div>
        </div>
        <div class="col-sm-5">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="gioi_tinh" id="membershipGioiTinh" value="0"
              {{--  {{ $user->gioi_tinh==0 ? 'checked=""' : '' }}--}}>Nữ</label>
          </div>
        </div>
      </div>
    <div class='form-group'>
        <label for='dia_chi'>Địa Chỉ</label>
        <input  type='text' name='dia_chi' class='form-control' id='dia_chi' placeholder='Địa Chỉ'>
    </div>
   
    <div class ='form-group'>
        <label for='cccd'>Căn Cước Công Dân</label>
        <input  type='text' name='cccd' class='form-control' id='cccd' placeholder='CCCD'>
    </div>

    <div class="form-group">
        <label for="trang_thai">Trạng Thái</label>
          <select class="form-control" id="trang_thai" name="trang_thai">
            <option value="0">Hoạt động</option>
            <option value="1">Không hoạt động</option>
          </select>
    </div>
    <div class="form-group">
        <label for="exampleSelectVaiTro">Vai Trò</label>
          <select class="form-control" id="exampleSelectVaiTro" name="role_id">

            @foreach ($role_id as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
          </select>
    </div>
    <button type='submit' class='btn btn-primary mr-2'>Save</button>
    <a href='admin.home.blade.php' type='submit' class='btn btn-light'>Cancel</a>

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